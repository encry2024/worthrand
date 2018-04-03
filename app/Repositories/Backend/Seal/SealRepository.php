<?php
/**
 * Created by PhpStorm.
 * User: christanjake2024
 * Date: 1/26/18
 * Time: 2:06 PM
 */

namespace App\Repositories\Backend\Seal;

# Facades
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
# Models
use App\Models\Seal\Seal;
use App\Models\Seal\SealPricingHistory;
use Auth;
# Exceptions
use App\Exceptions\GeneralException;
# Repository
use App\Repositories\BaseRepository;
# Events
use App\Events\Backend\Seal\SealCreated;
use App\Events\Backend\Seal\SealUpdated;
use App\Events\Backend\Seal\SealRestored;
use App\Events\Backend\Seal\SealUploaded;
use App\Events\Backend\Seal\SealPermanentlyDeleted;
use App\Events\Backend\PricingHistory\GeneralPricingHistoryCreated;
use App\Events\Backend\PricingHistory\GeneralPricingHistoryUpdated;
use App\Events\Backend\PricingHistory\GeneralPricingHistoryRestored;
use App\Events\Backend\PricingHistory\GeneralPricingHistoryPermanentlyDeleted;
/**
 * Class SealRepository.
 */
class SealRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model($object = Seal::class)
    {
        return $object;
    }

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getPaginatedSeal($paged = 25, $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
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
     * @return Seal
     */
    public function create(array $data) : Seal
    {
        return DB::transaction(function () use ($data) {
            $seal = parent::create([
                'name'              =>  $data['name'],
                'drawing_number'    =>  $data['drawing_number'],
                'size'              =>  $data['size'],
                'bom_number'        =>  $data['bom_number'],
                'end_user'          =>  $data['end_user'],
                'seal_type'         =>  $data['seal_type'],
                'material_number'   =>  $data['material_number'],
                'code'              =>  $data['code'],
                'model'             =>  $data['model'],
                'serial_number'     =>  $data['serial_number'],
                'tag'               =>  $data['tag'],
                'price'             =>  str_replace(',', '', $data['price']),
                'scanned_file'      => 'N/A',
            ]);

            if ($seal) {
                $auth_link = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
                $asset_link = "<a href='".route('admin.seal.show', $seal->id)."'>".$seal->name.'</a>';

                event(new SealCreated($auth_link, $asset_link));

                return $seal;
            }

            throw new GeneralException(__('exceptions.backend.seals.update_error'));
        });
    }

    /**
     * @param Seal  $seal
     * @param array $data
     *
     * @return Seal
     */
    public function update(Seal $seal, array $data) : Seal
    {
        return DB::transaction(function () use ($seal, $data) {
            if ($seal->update([
                'name'              =>  $data['name'],
                'drawing_number'    =>  $data['drawing_number'],
                'size'              =>  $data['size'],
                'bom_number'        =>  $data['bom_number'],
                'end_user'          =>  $data['end_user'],
                'seal_type'         =>  $data['seal_type'],
                'material_number'   =>  $data['material_number'],
                'code'              =>  $data['code'],
                'model'             =>  $data['model'],
                'serial_number'     =>  $data['serial_number'],
                'tag'               =>  $data['tag'],
                'price'             =>  str_replace(',', '', $data['price']),
                'scanned_file'      =>  $seal->scanned_file,
            ]))

            {
                $auth_link = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
                $asset_link = "<a href='".route('admin.seal.show', $seal->id)."'>".$seal->name.'</a>';

                event(new SealUpdated($auth_link, $asset_link));

                return $seal;
            }

            throw new GeneralException(__('exceptions.backend.seals.update_error'));
        });
    }

    /**
     * @param Seal $seal
     *
     * @return Seal
     * @throws GeneralException
     */
    public function forceDelete(Seal $seal) : Seal
    {
        if (is_null($seal->deleted_at)) {
            throw new GeneralException(__('exceptions.backend.seals.delete_first'));
        }

        return DB::transaction(function () use ($seal) {

            if ($seal->forceDelete()) {
                $auth_link = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';

                event(new SealPermanentlyDeleted($auth_link, $seal->name));

                return $seal;
            }

            throw new GeneralException(__('exceptions.backend.seals.delete_error'));
        });
    }

    /**
     * @param Seal $seal
     *
     * @return Seal
     * @throws GeneralException
     */
    public function restore(Seal $seal) : Seal
    {
        if (is_null($seal->deleted_at)) {
            throw new GeneralException(__('exceptions.backend.seals.cant_restore'));
        }

        if ($seal->restore()) {
            $auth_link = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
            $asset_link = "<a href='".route('admin.seal.show', $seal->id)."'>".$seal->name.'</a>';

            event(new SealRestored($auth_link, $asset_link));

            return $seal;
        }

        throw new GeneralException(__('exceptions.backend.seals.restore_error'));
    }

    /**
     * @param PricingHistory $seal
     *
     * @return PricingHistory
     * @throws GeneralException
     */
    public function add_pricing_history(array $data, $seal) : SealPricingHistory
    {
        return DB::transaction(function () use ($data, $seal) {
            $pricing_history    = SealPricingHistory::create([
                'seal_id'       =>  $seal->id,
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
                $asset_link = "<a href='".route('admin.seal.show', $seal->id)."'>".$seal->name.'</a>';
                $model      = class_basename($this->model);

                event(new GeneralPricingHistoryCreated($auth_link, $model, $pricing_history->po_number, $asset_link));

                return $pricing_history;
            }

            throw new GeneralException('There was a problem creating this pricing history. Please try again.');
        });
    }

    /**
     * @param PricingHistory $seal
     *
     * @return PricingHistory
     * @throws GeneralException
     */
    public function update_pricing_history(array $data, $seal, $pricing_history) : SealPricingHistory
    {
        return DB::transaction(function () use ($data, $seal, $pricing_history) {
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
                $asset_link = "<a href='".route('admin.seal.show', $seal->id)."'>".$seal->name.'</a>';
                $model      = class_basename($seal);

                event(new GeneralPricingHistoryUpdated($auth_link, $pricing_history->po_number, $model, $asset_link));

                return $pricing_history;
            }

            throw new GeneralException('There was a problem updating this pricing history. Please try again.');
        });
    }

    /**
     * @param PricingHistory $seal_pricing_history
     *
     * @return PricingHistory
     * @throws GeneralException
     */
    public function forceDeletePricingHistory(Seal $seal, SealPricingHistory $seal_pricing_history) : SealPricingHistory
    {
        if (is_null($seal_pricing_history->deleted_at)) {
            throw new GeneralException('Seal Pricing History "'. $seal_pricing_history->po_number .'" must be deleted first before can it can be destroyed permanently.');
        }

        return DB::transaction(function () use ($seal_pricing_history) {
            if ($seal_pricing_history->forceDelete()) {
                $auth_link  = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
                $asset_link = "<a href='".route('admin.seal.show', $seal->id)."'>".$seal->name.'</a>';
                $model      = class_basename($seal);

                event(new GeneralPricingHistoryPermanentlyDeleted($auth_link, $pricing_history->po_number, $model, $asset_link));

                return $seal_pricing_history;
            }

            throw new GeneralException('There was a problem deleting this Pricing History. Please try again.');
        });
    }

    /**
     * @param Seal $seal
     *
     * @return Seal
     * @throws GeneralException
     */
    public function restorePricingHistory(Seal $seal, SealPricingHistory $seal_pricing_history) : SealPricingHistory
    {
        if (is_null($seal_pricing_history->deleted_at)) {
            throw new GeneralException('Seal Pricing History "'. $seal_pricing_history->po_number .'" must be deleted first before can it can be restored.');
        }

        if ($seal_pricing_history->restore()) {
            $auth_link  = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
            $asset_link = "<a href='".route('admin.seal.show', $seal->id)."'>".$seal->name.'</a>';
            $model      = class_basename($seal);

            event(new GeneralPricingHistoryRestored($auth_link, $seal_pricing_history->po_number, $model, $asset_link));

            return $seal_pricing_history;
        }

        throw new GeneralException('There was a problem restoring this Pricing History. Please try again.');
    }
}
