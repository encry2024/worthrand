<?php
/**
 * Created by PhpStorm.
 * User: christanjake2024
 * Date: 1/26/18
 * Time: 2:06 PM
 */

namespace App\Repositories\Backend\Aftermarket;

# Facades
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
# Models
use App\Models\Aftermarket\Aftermarket;
use App\Models\Aftermarket\AftermarketPricingHistory;
use Auth;
# Exceptions
use App\Exceptions\GeneralException;
# Repository
use App\Repositories\BaseRepository;
# Events
use App\Events\Backend\Aftermarket\AftermarketCreated;
use App\Events\Backend\Aftermarket\AftermarketUpdated;
use App\Events\Backend\Aftermarket\AftermarketRestored;
use App\Events\Backend\Aftermarket\AftermarketUploaded;
use App\Events\Backend\Aftermarket\AftermarketPermanentlyDeleted;
use App\Events\Backend\PricingHistory\GeneralPricingHistoryCreated;
use App\Events\Backend\PricingHistory\GeneralPricingHistoryUpdated;
use App\Events\Backend\PricingHistory\GeneralPricingHistoryRestored;
use App\Events\Backend\PricingHistory\GeneralPricingHistoryPermanentlyDeleted;

/**
 * Class AftermarketRepository.
 */
class AftermarketRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Aftermarket::class;
    }

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getPaginatedAftermarket($paged = 25, $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
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
     * @return Aftermarket
     */
    public function create(array $data) : Aftermarket
    {
        return DB::transaction(function () use ($data) {
            $aftermarket = parent::create([
                'name'              => $data['name'],
                'model'             => $data['model'],
                'part_number'       => $data['part_number'],
                'reference_number'  => $data['reference_number'],
                'material_number'   => $data['material_number'],
                'serial_number'     => $data['serial_number'],
                'tag_number'        => $data['tag_number'],
                'ccn_number'        => $data['ccn_number'],
                'price'             => str_replace(',','',$data['price']),
                'company_name'      => $data['company_name'],
                'description'       => $data['description'],
                'stock_number'      => $data['stock_number'],
                'sap_number'        => $data['sap_number'],
                'scanned_file'      => 'N/A',
            ]);

            if ($aftermarket) {
                $auth_link = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
                $asset_link = "<a href='".route('admin.aftermarket.show', $aftermarket->id)."'>".$aftermarket->name.'</a>';

                event(new AftermarketCreated($auth_link, $asset_link));

                return $aftermarket;
            }

            throw new GeneralException(__('exceptions.backend.aftermarkets.update_error'));
        });
    }

    /**
     * @param Aftermarket  $aftermarket
     * @param array $data
     *
     * @return Aftermarket
     */
    public function update(Aftermarket $aftermarket, array $data) : Aftermarket
    {
        return DB::transaction(function () use ($aftermarket, $data) {
            if ($aftermarket->update([
                'name'              => $data['name'],
                'model'             => $data['model'],
                'part_number'       => $data['part_number'],
                'reference_number'  => $data['reference_number'],
                'material_number'   => $data['material_number'],
                'serial_number'     => $data['serial_number'],
                'tag_number'        => $data['tag_number'],
                'ccn_number'        => $data['ccn_number'],
                'price'             => str_replace(',','',$data['price']),
                'company_name'      => $data['company_name'],
                'description'       => $data['description'],
                'stock_number'      => $data['stock_number'],
                'sap_number'        => $data['sap_number'],
                'scanned_file'      => 'N/A',
            ]))

            {
                $auth_link = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
                $asset_link = "<a href='".route('admin.aftermarket.show', $aftermarket->id)."'>".$aftermarket->name.'</a>';

                event(new AftermarketUpdated($auth_link, $asset_link));

                return $aftermarket;
            }

            throw new GeneralException(__('exceptions.backend.aftermarkets.update_error'));
        });
    }

    /**
     * @param Aftermarket $aftermarket
     *
     * @return Aftermarket
     * @throws GeneralException
     */
    public function forceDelete(Aftermarket $aftermarket) : Aftermarket
    {
        if (is_null($aftermarket->deleted_at)) {
            throw new GeneralException(__('exceptions.backend.aftermarkets.delete_first'));
        }

        return DB::transaction(function () use ($aftermarket) {

            if ($aftermarket->forceDelete()) {
                $auth_link = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';

                event(new AftermarketPermanentlyDeleted($auth_link, $aftermarket->name));

                return $aftermarket;
            }

            throw new GeneralException(__('exceptions.backend.aftermarkets.delete_error'));
        });
    }

    /**
     * @param Aftermarket $aftermarket
     *
     * @return Aftermarket
     * @throws GeneralException
     */
    public function restore(Aftermarket $aftermarket) : Aftermarket
    {
        if (is_null($aftermarket->deleted_at)) {
            throw new GeneralException(__('exceptions.backend.aftermarkets.cant_restore'));
        }

        if ($aftermarket->restore()) {
            $auth_link = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
            $asset_link = "<a href='".route('admin.aftermarket.show', $aftermarket->id)."'>".$aftermarket->name.'</a>';

            event(new AftermarketRestored($auth_link, $asset_link));

            return $aftermarket;
        }

        throw new GeneralException(__('exceptions.backend.aftermarkets.restore_error'));
    }

    /**
     * @param PricingHistory $aftermarket
     *
     * @return PricingHistory
     * @throws GeneralException
     */
    public function add_pricing_history(array $data, $aftermarket) : AftermarketPricingHistory
    {
        return DB::transaction(function () use ($data, $aftermarket) {
            $pricing_history    = AftermarketPricingHistory::create([
                'aftermarket_id'    =>  $aftermarket->id,
                'po_number'     =>  $data['po_number'],
                'pricing_date'  =>  date('Y-m-d', strtotime($data['pricing_date'])),
                'price'         =>  $this->strip_currency($data['price']),
                'terms'         =>  $data['terms'],
                'delivery'      =>  $data['delivery'],
                'fpd_reference' =>  $data['fpd_reference'],
                'wpc_reference' =>  $data['wpc_reference']
            ]);

            if ($pricing_history) {

                $auth_link  = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
                $asset_link = "<a href='".route('admin.aftermarket.show', $aftermarket->id)."'>".$aftermarket->name.'</a>';
                $model      = class_basename($this->model);

                event(new GeneralPricingHistoryCreated($auth_link, $model, $pricing_history->po_number, $asset_link));

                return $pricing_history;
            }

            throw new GeneralException('There was a problem creating this pricing history. Please try again.');
        });
    }

    /**
     * @param PricingHistory $aftermarket
     *
     * @return PricingHistory
     * @throws GeneralException
     */
    public function update_pricing_history(array $data, $aftermarket, $pricing_history) : AftermarketPricingHistory
    {
        return DB::transaction(function () use ($data, $aftermarket, $pricing_history) {
            if($pricing_history->update([
                'po_number'     =>  $data['po_number'],
                'pricing_date'  =>  date('Y-m-d', strtotime($data['pricing_date'])),
                'price'         =>  $this->strip_currency($data['price']),
                'terms'         =>  $data['terms'],
                'delivery'      =>  $data['delivery'],
                'fpd_reference' =>  $data['fpd_reference'],
                'wpc_reference' =>  $data['wpc_reference']
            ]))

            {

                $auth_link  = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
                $asset_link = "<a href='".route('admin.aftermarket.show', $aftermarket->id)."'>".$aftermarket->name.'</a>';
                $model      = class_basename($aftermarket);

                event(new GeneralPricingHistoryUpdated($auth_link, $pricing_history->po_number, $model, $asset_link));

                return $pricing_history;
            }

            throw new GeneralException('There was a problem updating this pricing history. Please try again.');
        });
    }

    /**
     * @param PricingHistory $aftermarket_pricing_history
     *
     * @return PricingHistory
     * @throws GeneralException
     */
    public function forceDeletePricingHistory(Aftermarket $aftermarket, AftermarketPricingHistory $aftermarket_pricing_history) : AftermarketPricingHistory
    {
        if (is_null($aftermarket_pricing_history->deleted_at)) {
            throw new GeneralException('Aftermarket Pricing History "'. $aftermarket_pricing_history->po_number .'" must be deleted first before can it can be destroyed permanently.');
        }

        return DB::transaction(function () use ($aftermarket_pricing_history) {
            if ($aftermarket_pricing_history->forceDelete()) {
                $auth_link  = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
                $asset_link = "<a href='".route('admin.aftermarket.show', $aftermarket->id)."'>".$aftermarket->name.'</a>';
                $model      = class_basename($aftermarket);

                event(new GeneralPricingHistoryPermanentlyDeleted($auth_link, $pricing_history->po_number, $model, $asset_link));

                return $aftermarket_pricing_history;
            }

            throw new GeneralException('There was a problem deleting this Pricing History. Please try again.');
        });
    }

    /**
     * @param Aftermarket $aftermarket
     *
     * @return Aftermarket
     * @throws GeneralException
     */
    public function restorePricingHistory(Aftermarket $aftermarket, AftermarketPricingHistory $aftermarket_pricing_history) : AftermarketPricingHistory
    {
        if (is_null($aftermarket_pricing_history->deleted_at)) {
            throw new GeneralException('Aftermarket Pricing History "'. $aftermarket_pricing_history->po_number .'" must be deleted first before can it can be restored.');
        }

        if ($aftermarket_pricing_history->restore()) {
            $auth_link  = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
            $asset_link = "<a href='".route('admin.aftermarket.show', $aftermarket->id)."'>".$aftermarket->name.'</a>';
            $model      = class_basename($aftermarket);

            event(new GeneralPricingHistoryRestored($auth_link, $aftermarket_pricing_history->po_number, $model, $asset_link));

            return $aftermarket_pricing_history;
        }

        throw new GeneralException('There was a problem restoring this Pricing History. Please try again.');
    }
}
