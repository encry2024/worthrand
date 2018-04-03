<?php

namespace App\Http\Controllers\Backend\Aftermarket;

# Event
use App\Events\Backend\Aftermarket\AftermarketDeleted;
# Facades
use Illuminate\Http\Request;
use Auth;
# Models
use App\Models\Aftermarket\Aftermarket;
use App\Models\Customer\Customer;
# Controllers
use App\Http\Controllers\Controller;
# Requests
use App\Http\Requests\Backend\Aftermarket\ManageAftermarketRequest;
use App\Http\Requests\Backend\Aftermarket\StoreAftermarketRequest;
use App\Http\Requests\Backend\Aftermarket\CreateAftermarketRequest;
use App\Http\Requests\Backend\Aftermarket\UpdateAftermarketRequest;
use App\Http\Requests\Backend\Aftermarket\DeleteAftermarketRequest;
# Repository
use App\Repositories\Backend\Aftermarket\AftermarketRepository;

class AftermarketController extends Controller
{
    protected $aftermarketRepository;

    /**
     * AftermarketController constructor.
     * @param $aftermarketRepository
     */
    public function __construct(AftermarketRepository $aftermarketRepository)
    {
        $this->aftermarketRepository = $aftermarketRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ManageAftermarketRequest $request)
    {
        return view('backend.aftermarket.index')
            ->withAftermarkets($this->aftermarketRepository->getPaginatedAftermarket());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreateAftermarketRequest $request)
    {
        return view('backend.aftermarket.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAftermarketRequest $request)
    {
        $this->aftermarketRepository->create($request->except('_token'));

        return redirect()->route('admin.aftermarket.index')
            ->withFlashSuccess(__('alerts.backend.aftermarkets.created', ['aftermarket' => $request->name]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Aftermarket $aftermarket, ManageAftermarketRequest $request)
    {
        return view('backend.aftermarket.show')->withModel($aftermarket);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Aftermarket $aftermarket, UpdateAftermarketRequest $request)
    {
        $customers = Customer::withTrashed()->get();

        return view('backend.aftermarket.edit')->withAftermarket($aftermarket);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAftermarketRequest $request, Aftermarket $aftermarket)
    {
        $this->aftermarketRepository->update($aftermarket, $request->except('_token', '_method'));

        return redirect()->back()->withFlashSuccess(__('alerts.backend.aftermarkets.updated', ['aftermarket' => $aftermarket->name]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aftermarket $aftermarket, DeleteAftermarketRequest $request)
    {
        $this->aftermarketRepository->deleteById($aftermarket->id);

        $auth_link = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
        $asset_link = "<a href='".route('admin.aftermarket.show', $aftermarket->id)."'>".$aftermarket->name.'</a>';

        event(new AftermarketDeleted($auth_link, $asset_link));

        return redirect()->route('admin.aftermarket.deleted')->withFlashSuccess(__('alerts.backend.aftermarkets.deleted', ['aftermarket' => $aftermarket->name]));
    }
}
