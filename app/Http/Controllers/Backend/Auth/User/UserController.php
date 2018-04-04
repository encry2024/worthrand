<?php

namespace App\Http\Controllers\Backend\Auth\User;

use App\Models\Auth\User;
use App\Models\TargetRevenue\TargetRevenue;
use Auth;
use App\Models\Customer\Customer;
use App\Http\Controllers\Controller;
use App\Events\Backend\Auth\User\UserDeleted;
use App\Repositories\Backend\Auth\RoleRepository;
use App\Repositories\Backend\Auth\UserRepository;
use App\Repositories\Backend\Auth\PermissionRepository;
use App\Http\Requests\Backend\Auth\User\StoreUserRequest;
use App\Http\Requests\Backend\Auth\User\ManageUserRequest;
use App\Http\Requests\Backend\Auth\User\UpdateUserRequest;
use App\Http\Requests\Backend\Auth\User\AssignCustomerToUserRequest;

/**
 * Class UserController.
 */
class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * UserController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageUserRequest $request)
    {
        return view('backend.auth.user.index')
            ->withUsers($this->userRepository->getActivePaginated(25, 'id', 'asc'));
    }

    /**
     * @param ManageUserRequest    $request
     * @param RoleRepository       $roleRepository
     * @param PermissionRepository $permissionRepository
     *
     * @return mixed
     */
    public function create(ManageUserRequest $request, RoleRepository $roleRepository, PermissionRepository $permissionRepository)
    {
        return view('backend.auth.user.create')
            ->withRoles($roleRepository->with('permissions')->get(['id', 'name']))
            ->withPermissions($permissionRepository->get(['id', 'name']));
    }

    /**
     * @param StoreUserRequest $request
     *
     * @return mixed
     */
    public function store(StoreUserRequest $request)
    {
        $this->userRepository->create($request->only(
            'first_name',
            'last_name',
            'email',
            'password',
            'timezone',
            'active',
            'confirmed',
            'confirmation_email',
            'roles',
            'permissions'
        ));

        return redirect()->route('admin.auth.user.index')->withFlashSuccess(__('alerts.backend.users.created'));
    }

    /**
     * @param User              $user
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function show(User $user, ManageUserRequest $request)
    {
        return view('backend.auth.user.show')
            ->withUser($user);
    }

    /**
     * @param User                 $user
     * @param ManageUserRequest    $request
     * @param RoleRepository       $roleRepository
     * @param PermissionRepository $permissionRepository
     *
     * @return mixed
     */
    public function edit(User $user, ManageUserRequest $request, RoleRepository $roleRepository, PermissionRepository $permissionRepository)
    {
        return view('backend.auth.user.edit')
            ->withUser($user)
            ->withRoles($roleRepository->get())
            ->withUserRoles($user->roles->pluck('name')->all())
            ->withPermissions($permissionRepository->get(['id', 'name']))
            ->withUserPermissions($user->permissions->pluck('name')->all());
    }

    /**
     * @param User              $user
     * @param UpdateUserRequest $request
     *
     * @return mixed
     */
    public function update(User $user, UpdateUserRequest $request)
    {
        $this->userRepository->update($user, $request->only(
            'first_name',
            'last_name',
            'email',
            'timezone',
            'roles',
            'permissions'
        ));

        return redirect()->route('admin.auth.user.index')->withFlashSuccess(__('alerts.backend.users.updated'));
    }

    /**
     * @param User              $user
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function destroy(User $user, ManageUserRequest $request)
    {
        $this->userRepository->deleteById($user->id);
        $doer = Auth::user()->full_name;
        event(new UserDeleted($doer, $user));

        return redirect()->route('admin.auth.user.deleted')->withFlashSuccess(__('alerts.backend.users.deleted'));
    }

    public function assignCustomer(User $user, AssignCustomerToUserRequest $request)
    {
        $customers = Customer::where('user_id', null)->get();

        return view('backend.auth.user.assign-customer')->withCustomers($customers)->withUser($user);
    }

    public function storeAssignedCustomer(User $user, AssignCustomerToUserRequest $request)
    {
        $customer_ids   = $request->get('customer');
        end($customer_ids);
        $last_index     = key($customer_ids);
        $customer_names = "";

        $this->userRepository->storeAssignedCustomer($user, $request->only('customer'));

        foreach($customer_ids as $key => $value) {
            $customer = Customer::find($value);
            if ($key == $last_index) {
                $customer_names .= ''.$customer->name.'';
            } else {
                $customer_names .= ''.$customer->name.', ';
            }
        }

        return redirect()->back()->withFlashSuccess('Customer(s) ['.$customer_names.'] was assigned to Sales Engineer "'.$user->full_name.'"');
    }

    public function targetRevenue(User $user)
    {
        return view('backend.auth.user.target_revenue')->withUser($user);
    }

    public function setTargetRevenue(User $user, ManageUserRequest $request)
    {
        $this->userRepository->setRevenue($user, $request->only('target_sale'));

        return redirect()->back()->with('You have successfully set user\'s target revenue');
    }
}
