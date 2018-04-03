<?php
/**
 * Created by PhpStorm.
 * User: christanjake2024
 * Date: 1/26/18
 * Time: 2:06 PM
 */

namespace App\Repositories\Backend\Customer;

# Facades
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
# Models
use App\Models\Customer\Customer;
use Auth;
# Exceptions
use App\Exceptions\GeneralException;
# Repository
use App\Repositories\BaseRepository;
# Events
use App\Events\Backend\Customer\CustomerCreated;
use App\Events\Backend\Customer\CustomerUpdated;
use App\Events\Backend\Customer\CustomerRestored;
use App\Events\Backend\Customer\CustomerPermanentlyDeleted;

/**
 * Class CustomerRepository.
 */
class CustomerRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Customer::class;
    }

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getPaginatedCustomer($paged = 25, $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
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

    /**
     * @param array $data
     *
     * @return Customer
     */
    public function create(array $data) : Customer
    {
        return DB::transaction(function () use ($data) {
            $customer = parent::create([
                'user_id'                       =>  Auth::user()->id,
                'name'                          =>  $data['name'],
                'city'                          =>  $data['city'],
                'postal_code'                   =>  $data['postal_code'],
                'address'                       =>  $data['address'],
                'plant_site_address'            =>  $data['plant_site_address'],
                'contact_person'                =>  $data['contact_person'],
                'contact_number'                =>  $data['contact_number'],
                'position_of_contact_person'    =>  $data['position_of_contact_person']
            ]);

            if ($customer) {
                $auth_link = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
                $asset_link = "<a href='".route('admin.project.show', $customer->id)."'>".$customer->name.'</a>';

                event(new CustomerCreated($auth_link, $asset_link));

                return $customer;
            }

            throw new GeneralException(__('exceptions.backend.projects.update_error'));
        });
    }

    /**
     * @param Customer  $customer
     * @param array $data
     *
     * @return Customer
     */
    public function update(Customer $customer, array $data) : Customer
    {
        return DB::transaction(function () use ($customer, $data) {
            if ($customer->update([
                'name'                          =>  $data['name'],
                'city'                          =>  $data['city'],
                'postal_code'                   =>  $data['postal_code'],
                'address'                       =>  $data['address'],
                'plant_site_address'            =>  $data['plant_site_address'],
                'contact_person'                =>  $data['contact_person'],
                'contact_number'                =>  $data['contact_number'],
                'position_of_contact_person'    =>  $data['position_of_contact_person']
            ]))

            {
                $auth_link = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
                $asset_link = "<a href='".route('admin.project.show', $customer->id)."'>".$customer->name.'</a>';

                event(new CustomerUpdated($auth_link, $asset_link));

                return $customer;
            }

            throw new GeneralException(__('exceptions.backend.projects.update_error'));
        });
    }

    /**
     * @param Customer $customer
     *
     * @return Customer
     * @throws GeneralException
     */
    public function forceDelete(Customer $customer) : Customer
    {
        if (is_null($customer->deleted_at)) {
            throw new GeneralException(__('exceptions.backend.projects.delete_first'));
        }

        return DB::transaction(function () use ($customer) {

            if ($customer->forceDelete()) {
                $auth_link = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';

                event(new CustomerPermanentlyDeleted($auth_link, $customer->name));

                return $customer;
            }

            throw new GeneralException(__('exceptions.backend.projects.delete_error'));
        });
    }

    /**
     * @param Customer $customer
     *
     * @return Customer
     * @throws GeneralException
     */
    public function restore(Customer $customer) : Customer
    {
        if (is_null($customer->deleted_at)) {
            throw new GeneralException(__('exceptions.backend.projects.cant_restore'));
        }

        if ($customer->restore()) {
            $auth_link = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
            $asset_link = "<a href='".route('admin.project.show', $customer->id)."'>".$customer->name.'</a>';

            event(new CustomerRestored($auth_link, $asset_link));

            return $customer;
        }

        throw new GeneralException(__('exceptions.backend.projects.restore_error'));
    }
}
