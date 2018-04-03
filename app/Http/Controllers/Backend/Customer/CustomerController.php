<?php

namespace App\Http\Controllers\Backend\Customer;

# Facades
use Illuminate\Http\Request;
use Auth;
# Controller
use App\Http\Controllers\Controller;
# Models
use App\Models\Customer\Customer;
# Requests
use App\Http\Requests\Backend\Customer\ManageCustomerRequest;
use App\Http\Requests\Backend\Customer\StoreCustomerRequest;
use App\Http\Requests\Backend\Customer\CreateCustomerRequest;
use App\Http\Requests\Backend\Customer\UpdateCustomerRequest;
use App\Http\Requests\Backend\Customer\DeleteCustomerRequest;
use App\Http\Requests\Backend\Customer\EditCustomerRequest;
# Repository
use App\Repositories\Backend\Customer\CustomerRepository;
# Event
use App\Events\Backend\Customer\CustomerDeleted;

class CustomerController extends Controller
{
    protected $customerRepository;
    /**
     * CustomerController constructor.
     */
    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ManageCustomerRequest $request)
    {
        return view('backend.customer.index')
            ->withCustomers($this->customerRepository->getPaginatedCustomer());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreateCustomerRequest $request)
    {
        return view('backend.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCustomerRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        $this->customerRepository->create($request->only(
            'name', 'city', 'postal_code', 'address', 'contact_person', 'contact_number', 'position_of_contact_person',
            'plant_site_address'
        ));

        return redirect()->route('admin.customer.index')->withFlashSuccess(__('alerts.backend.customers.created', ['customer' => $request->name]));
    }

    /**
     * Display the specified resource.
     *
     * @param  Customer              $customer
     * @param  ManageCustomerRequest $request
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer, ManageCustomerRequest $request)
    {
        return view('backend.customer.show')->withModel($customer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Customer              $customer
     * @param  UpdateCustomerRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer, EditCustomerRequest $request)
    {
        return view('backend.customer.edit')->withCustomer($customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $this->customerRepository->update($customer, $request->only(
            'name', 'city', 'postal_code', 'address', 'contact_person', 'contact_number', 'position_of_contact_person',
            'plant_site_address'
        ));

        return redirect()->back()->withFlashSuccess(__('alerts.backend.customers.updated', ['customer' => $customer->name]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteCustomerRequest $request, Customer $customer)
    {
        $this->customerRepository->deleteById($customer->id);

        $auth_link = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
        $asset_link = "<a href='".route('admin.customer.show', $customer->id)."'>".$customer->name.'</a>';

        event(new CustomerDeleted($auth_link, $asset_link));

        return redirect()->route('admin.customer.deleted')->withFlashSuccess(__('alerts.backend.customers.deleted', ['customer' => $customer->name]));
    }
}
