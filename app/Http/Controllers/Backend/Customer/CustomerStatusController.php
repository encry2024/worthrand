<?php

namespace App\Http\Controllers\Backend\Customer;

use App\Models\Customer\Customer;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Customer\CustomerRepository;
use App\Http\Requests\Backend\Customer\RestoreCustomerRequest;
use App\Http\Requests\Backend\Customer\ForceDeleteCustomerRequest;
use App\Http\Requests\Backend\Customer\ManageCustomerRequest;

/**
 * Class CustomerStatusController.
 */
class CustomerStatusController extends Controller
{
    /**
     * @var CustomerRepository
     */
    protected $customerRepository;

    /**
     * @param CustomerRepository $customerRepository
     */
    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function getDeleted(ManageCustomerRequest $request)
    {
        return view('backend.customer.deleted')
            ->withCustomers($this->customerRepository->getDeletedPaginated());
    }

    /**
     * @param Customer              $deletedCustomer
     * @param ManageCustomerRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function delete(Customer $deletedCustomer, ForceDeleteCustomerRequest $request)
    {
        $this->customerRepository->forceDelete($deletedCustomer);

        return redirect()->route('admin.customer.deleted')->withFlashSuccess(__('alerts.backend.customers.deleted_permanently', ['customer' => $deletedCustomer->name]));
    }

    /**
     * @param Customer              $deletedCustomer
     * @param ManageCustomerRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function restore(Customer $deletedCustomer, RestoreCustomerRequest $request)
    {
        $this->customerRepository->restore($deletedCustomer);

        return redirect()->route('admin.customer.index')->withFlashSuccess(__('alerts.backend.customers.restored', ['customer' => $deletedCustomer->name]));
    }

    public function showDeleted(Customer $customer)
    {
        return view('backend.customer.show')->withCustomer($customer);
    }
}
