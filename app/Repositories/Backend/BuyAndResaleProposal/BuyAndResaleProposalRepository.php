<?php
/**
 * Created by PhpStorm.
 * User: christanjake2024
 * Date: 1/26/18
 * Time: 2:06 PM
 */

namespace App\Repositories\Backend\BuyAndResaleProposal;

# Facades
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
# Models
use App\Models\BuyAndResaleProposal\BuyAndResaleProposal;
use App\Models\BuyAndResaleProposal\BuyAndResaleProposalItem;
use App\Models\Project\Project;
use App\Models\Project\ProjectPricingHistory;
use App\Models\Aftermarket\Aftermarket;
use App\Models\Aftermarket\AftermarketPricingHistory;
use App\Models\Seal\Seal;
use App\Models\TargetRevenue\TargetRevenue;
use App\Models\TargetRevenue\TargetRevenueHistory;
use App\Models\Seal\SealPricingHistory;
use App\Models\Auth\User;
use Auth;
# Exceptions
use App\Exceptions\GeneralException;
# Repository
use App\Repositories\BaseRepository;
# Events
use App\Events\Backend\BuyAndResaleProposal\BuyAndResaleProposalAccepted;
use App\Events\Backend\BuyAndResaleProposal\BuyAndResaleProposalCollected;
use App\Events\Backend\BuyAndResaleProposal\BuyAndResaleProposalCreated;
use App\Events\Backend\BuyAndResaleProposal\BuyAndResaleProposalPermanentlyDeleted;
use App\Events\Backend\BuyAndResaleProposal\BuyAndResaleProposalRestored;
use App\Events\Backend\BuyAndResaleProposal\BuyAndResaleProposalUpdated;
use App\Events\Backend\BuyAndResaleProposal\BuyAndResaleProposalUploaded;

/**
 * Class BuyAndResaleProposalRepository.
 */
class BuyAndResaleProposalRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return BuyAndResaleProposal::class;
    }

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getPaginatedBuyAndResaleProposal($paged = 25, $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return LengthAwarePaginator
     */
    public function getDeletedPaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            ->onlyTrashed()
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    public function strip_currency($price)
    {
        return str_replace(',','',$price);
    }

    /**
     * @param array $data
     *
     * @return BuyAndResaleProposal
     */
    public function create(array $data) : BuyAndResaleProposal
    {
        $total_ordered_products = count($data['buy_and_resale_proposal_itemmable_id']);

        return DB::transaction(function () use ($data, $total_ordered_products) {
            $products = $data['buy_and_resale_proposal_itemmable_id'];

            $buy_and_resale_proposal = parent::create([
                'purchase_order'        => 'N/A',
                'customer_id'           => $data['customer'],
                'user_id'               => Auth::user()->id,
                'invoice_to'            => $data['invoice_to'],
                'invoice_address'       => $data['invoice_to_address'],
                'date'                  => date('Y-m-d'),
                'wpc_reference'         => $data['wpc_reference'],
                'qrc_reference'         => $data['qrc_reference'],
                'validity'              => $data['validity'],
                'payment_terms'         => $data['payment_terms'],
                'status'                => 'SENT',
                'collection_status'     => 'PENDING',
                'file_name'             => 'N/A'
            ]);

            if ($buy_and_resale_proposal) {
                $i = 0;

                while($i < $total_ordered_products) {
                    $product = explode('-', $data['buy_and_resale_proposal_itemmable_id'][$i]);
                    $product_id  = $product[0];
                    $product_model = 'App\\Models\\'.$product[1].'\\'.$product[1];
                    
                    $buy_and_resale_proposal_item                                           = new BuyAndResaleProposalItem;
                    $buy_and_resale_proposal_item->buy_and_resale_proposal_id               = $buy_and_resale_proposal->id;
                    $buy_and_resale_proposal_item->buy_and_resale_proposal_itemmable_id     = $product_id;
                    $buy_and_resale_proposal_item->buy_and_resale_proposal_itemmable_type   = $product_model;
                    $buy_and_resale_proposal_item->quantity                                 = $data['quantity'][$i];
                    $buy_and_resale_proposal_item->price                                    = str_replace(',','',$data['price'][$i]);
                    $buy_and_resale_proposal_item->currency                                 = $data['currency'][$i];
                    $buy_and_resale_proposal_item->delivery                                 = $data['delivery_date'][$i];
                    $buy_and_resale_proposal_item->status                                   = 'PROCESSING';
                    $buy_and_resale_proposal_item->notify_me_after                          = 30;
                    $buy_and_resale_proposal_item->notification_date                        = date('Y-m-d');

                    if ($buy_and_resale_proposal_item->save()) {
                        $product_object = $product_model::find($product_id);
                        $foreign_key = strtolower($product_object->data_model).'_id';
                        $pricing_history_model = $product_model.'PricingHistory';

                        $pricing_history                = new $pricing_history_model;
                        $pricing_history->po_number     = 'N/A';
                        $pricing_history->$foreign_key  = $product_id;
                        $pricing_history->pricing_date  = date('Y-m-d');
                        $pricing_history->price         = $buy_and_resale_proposal_item->price;
                        $pricing_history->terms         = "30-days";
                        $pricing_history->delivery      = "TEST DELIVERY";
                        $pricing_history->fpd_reference = "TEST_FPD_REFERENCE";
                        $pricing_history->wpc_reference = $buy_and_resale_proposal->wpc_reference;

                        if ($pricing_history->save()) {
                            $product_object->update(['price' => $pricing_history->price]);
                        }
                    }

                    $i++;
                }

                $auth_link  = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
                $asset_link = "<a href='".route('admin.buy-and-resale-proposal.show', $buy_and_resale_proposal->id)."'>".$buy_and_resale_proposal->wpc_reference.'</a>';

                event(new BuyAndResaleProposalCreated($auth_link, $asset_link));

                return $buy_and_resale_proposal;
            }

            throw new GeneralException(__('exceptions.backend.buy_and_resale_proposals.update_error'));
        });
    }

    /**
     * @param BuyAndResaleProposal  $buy_and_resale_proposal
     * @param array $data
     *
     * @return BuyAndResaleProposal
     */
    public function update(BuyAndResaleProposal $buy_and_resale_proposal, array $data) : BuyAndResaleProposal
    {
        return DB::transaction(function () use ($buy_and_resale_proposal, $data) {
            if ($buy_and_resale_proposal->update([
                'customer_id'           =>   $data['customer'],
                'name'                  =>   $data['name'],
                'source'                =>   $data['source'],
                'address_1'             =>   $data['address_1'],
                'contact_person_1'      =>   $data['contact_person_1'],
                'contact_number_1'      =>   $data['contact_number_1'],
                'email_1'               =>   $data['email_1'],

                'consultant'            =>   $data['consultant'],
                'address_2'             =>   $data['address_2'],
                'contact_person_2'      =>   $data['contact_person_2'],
                'contact_number_2'      =>   $data['contact_number_2'],
                'email_2'               =>   $data['email_2'],

                'shorted_list_epc'      =>   $data['shorted_list_epc'],
                'address_3'             =>   $data['address_3'],
                'contact_person_3'      =>   $data['contact_person_3'],
                'contact_number_3'      =>   $data['contact_number_3'],
                'email_3'               =>   $data['email_3'],

                'approved_vendors_list' =>   $data['approved_vendors_list'],
                'requirements_coor'     =>   $data['requirements_coor'],
                'epc_award'             =>   $data['epc_award'],
                'award_date'            =>  date('Y-m-d', strtotime($data['award_date'])),
                'implementation_date'   =>  date('Y-m-d', strtotime($data['implementation_date'])),
                'execution_date'        =>  date('Y-m-d', strtotime($data['execution_date'])),

                'bu'                    =>   $data['bu'],
                'bu_reference'          =>   $data['bu_reference'],
                'wpc_reference'         =>   $data['wpc_reference'],
                'affinity_reference'    =>   $data['affinity_reference'],
                'value'                 =>   $data['value'],

                'reference_number'      =>   $data['reference_number'],
                'types_of_sales'        =>   $data['types_of_sales'],
                'tag_number'            =>   $data['tag_number'],
                'application'           =>   $data['application'],
                'pump_model'            =>   $data['pump_model'],
                'serial_number'         =>   $data['serial_number'],
                'competitors'           =>   $data['competitors'],
                'final_result'          =>   $data['final_result'],

                'status'                =>   'Undefined',

                'scanned_file'          =>   $buy_and_resale_proposal->scanned_file
            ]))

            {
                $auth_link = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
                $asset_link = "<a href='".route('admin.buy_and_resale_proposal.show', $buy_and_resale_proposal->id)."'>".$buy_and_resale_proposal->name.'</a>';

                event(new BuyAndResaleProposalUpdated($auth_link, $asset_link));

                return $buy_and_resale_proposal;
            }

            throw new GeneralException(__('exceptions.backend.buy_and_resale_proposals.update_error'));
        });
    }

    /**
     * @param BuyAndResaleProposal $buy_and_resale_proposal
     *
     * @return BuyAndResaleProposal
     * @throws GeneralException
     */
    public function forceDelete(BuyAndResaleProposal $buy_and_resale_proposal) : BuyAndResaleProposal
    {
        if (is_null($buy_and_resale_proposal->deleted_at)) {
            throw new GeneralException(__('exceptions.backend.buy_and_resale_proposals.delete_first'));
        }

        return DB::transaction(function () use ($buy_and_resale_proposal) {

            if ($buy_and_resale_proposal->forceDelete()) {
                $auth_link = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';

                event(new BuyAndResaleProposalPermanentlyDeleted($auth_link, $buy_and_resale_proposal->name));

                return $buy_and_resale_proposal;
            }

            throw new GeneralException(__('exceptions.backend.buy_and_resale_proposals.delete_error'));
        });
    }

    /**
     * @param BuyAndResaleProposal $buy_and_resale_proposal
     *
     * @return BuyAndResaleProposal
     * @throws GeneralException
     */
    public function restore(BuyAndResaleProposal $buy_and_resale_proposal) : BuyAndResaleProposal
    {
        if (is_null($buy_and_resale_proposal->deleted_at)) {
            throw new GeneralException(__('exceptions.backend.buy_and_resale_proposals.cant_restore'));
        }

        if ($buy_and_resale_proposal->restore()) {
            $auth_link = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
            $asset_link = "<a href='".route('admin.buy_and_resale_proposal.show', $buy_and_resale_proposal->id)."'>".$buy_and_resale_proposal->name.'</a>';

            event(new BuyAndResaleProposalRestored(Auth::user()->full_name, $asset_link));

            return $buy_and_resale_proposal;
        }

        throw new GeneralException(__('exceptions.backend.buy_and_resale_proposals.restore_error'));
    }

    public function accept(BuyAndResaleProposal $buy_and_resale_proposal) : BuyAndResaleProposal
    {
        return DB::transaction(function () use ($buy_and_resale_proposal) {
            if ($buy_and_resale_proposal->update([
                'collection_status' => 'ACCEPTED'
            ]))

            {
                /*$auth_link = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
                $asset_link = "<a href='".route('admin.buy_and_resale_proposal.show', $buy_and_resale_proposal->id)."'>".$buy_and_resale_proposal->name.'</a>';

                event(new BuyAndResaleProposalUpdated($auth_link, $asset_link));*/

                return $buy_and_resale_proposal;
            }

            throw new GeneralException(__('exceptions.backend.buy_and_resale_proposals.update_error'));
        });
    }

    public function sendToAssistant(BuyAndResaleProposal $buy_and_resale_proposal, $data) : BuyAndResaleProposal
    {
        return DB::transaction(function () use ($buy_and_resale_proposal, $data) {
            if ($buy_and_resale_proposal->update([
                'collection_status'         => 'DELIVERY',
                'purchase_order'            => $data['purchase_order']
            ]))

            {
                /*$auth_link = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
                $asset_link = "<a href='".route('admin.buy_and_resale_proposal.show', $buy_and_resale_proposal->id)."'>".$buy_and_resale_proposal->name.'</a>';

                event(new BuyAndResaleProposalUpdated($auth_link, $asset_link));*/

                return $buy_and_resale_proposal;
            }

            throw new GeneralException(__('exceptions.backend.buy_and_resale_proposals.update_error'));
        });
    }

    public function sendToCollection(BuyAndResaleProposal $buy_and_resale_proposal) : BuyAndResaleProposal
    {
        return DB::transaction(function () use ($buy_and_resale_proposal) {
            if ($buy_and_resale_proposal->update([
                'collection_status'   => 'FOR-COLLECTION'
            ]))

            {
                /*$auth_link = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
                $asset_link = "<a href='".route('admin.buy_and_resale_proposal.show', $buy_and_resale_proposal->id)."'>".$buy_and_resale_proposal->name.'</a>';

                event(new BuyAndResaleProposalUpdated($auth_link, $asset_link));*/

                return $buy_and_resale_proposal;
            }

            throw new GeneralException(__('exceptions.backend.buy_and_resale_proposals.update_error'));
        });
    }

    public function changeItemDeliveryStatus(BuyAndResaleProposalItem $item, $data)
    {
        return DB::transaction(function () use ($item, $data) {
            if ($item->update(['status' => $data['delivery_status']])) {
                return $item;
            }

            throw new GeneralException('Updating item delivery status failed.');
        });
    }

    public function sendToCollector(BuyAndResaleProposal $buy_and_resale_proposal, $data) : BuyAndResaleProposal
    {
        return DB::transaction(function () use ($buy_and_resale_proposal, $data) {
            if ($buy_and_resale_proposal->update(['collection_status' => 'FOR-COLLECTION'])) {
                return $buy_and_resale_proposal;
            }

            throw new Exception('Updating Proposal\'s collection status failed. Please contact the administrator.');
        });
    }

    public function collect(BuyAndResaleProposal $buy_and_resale_proposal) : BuyAndResaleProposal
    {
        return DB::transaction(function () use ($buy_and_resale_proposal) {
            $user = User::find($buy_and_resale_proposal->user_id);
            $target_revenue = TargetRevenue::where('user_id', $user->id)->latest()->first();


            $total_collected = 0;
            $total_price = 0;

            if ($buy_and_resale_proposal->update([
                'collection_status' => 'COMPLETED'
            ])) 

            {
                $items = $buy_and_resale_proposal->buy_and_resale_proposal_items;

                foreach ($items as $item) {
                    $from = $item->currency;

                    $url = file_get_contents('https://free.currencyconverterapi.com/api/v5/convert?q=' . $from . '_USD&compact=ultra');
                    $json = json_decode($url, true);
                    $rate = implode(" ", $json);

                    $total_collected += ($item->price * $rate) * $item->quantity;
                    $total_price = ($item->price * $rate) * $item->quantity;

                    $target_revenue_history = new TargetRevenueHistory();
                    $target_revenue_history->target_revenue_id = $target_revenue->id;
                    $target_revenue_history->collected = $total_price;
                    $target_revenue_history->date = date('Y-m-d');
                    $target_revenue_history->target_revenue_historable_type = 'App\\Models\\BuyAndResaleProposal\\BuyAndResaleProposal';
                    $target_revenue_history->target_revenue_historable_id = $buy_and_resale_proposal->id;
                    $target_revenue_history->save();
                }

                $target_revenue->current_sale = $total_collected + $target_revenue->current_sale;
                $target_revenue->save();

                return $buy_and_resale_proposal;
            }

            throw new GeneralException('Updating proposal status failed.');
        });
    }
}
