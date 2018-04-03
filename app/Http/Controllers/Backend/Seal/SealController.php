<?php

namespace App\Http\Controllers\Backend\Seal;

# Event
use App\Events\Backend\Seal\SealDeleted;
# Facades
use Illuminate\Http\Request;
use Auth;
# Model
use App\Models\Seal\Seal;
# Controllers
use App\Http\Controllers\Controller;
# Requests
use App\Http\Requests\Backend\Seal\ManageSealRequest;
use App\Http\Requests\Backend\Seal\StoreSealRequest;
use App\Http\Requests\Backend\Seal\CreateSealRequest;
use App\Http\Requests\Backend\Seal\EditSealRequest;
use App\Http\Requests\Backend\Seal\UpdateSealRequest;
use App\Http\Requests\Backend\Seal\DeleteSealRequest;
# Repository
use App\Repositories\Backend\Seal\SealRepository;

class SealController extends Controller
{
    protected $sealRepository;

    /**
     * SealController constructor.
     * @param $sealRepository
     */
    public function __construct(SealRepository $sealRepository)
    {
        $this->sealRepository = $sealRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ManageSealRequest $request)
    {
        return view('backend.seal.index')
            ->withSeals($this->sealRepository->getPaginatedSeal());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreateSealRequest $request)
    {
        return view('backend.seal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSealRequest $request)
    {
        $this->sealRepository->create($request->except('_token'));

        return redirect()->route('admin.seal.index')
            ->withFlashSuccess(__('alerts.backend.seals.created', ['seal' => $request->name]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Seal $seal, ManageSealRequest $request)
    {
        return view('backend.seal.show')->withModel($seal);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Seal $seal, EditSealRequest $request)
    {
        return view('backend.seal.edit')->withSeal($seal);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSealRequest $request, Seal $seal)
    {
        $this->sealRepository->update($seal, $request->except('_token', '_method'));

        return redirect()->back()->withFlashSuccess(__('alerts.backend.seals.updated', ['seal' => $seal->name]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seal $seal, DeleteSealRequest $request)
    {
        $this->sealRepository->deleteById($seal->id);

        $auth_link = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
        $asset_link = "<a href='".route('admin.seal.show', $seal->id)."'>".$seal->name.'</a>';

        event(new SealDeleted($auth_link, $asset_link));

        return redirect()->route('admin.seal.deleted')->withFlashSuccess(__('alerts.backend.seals.deleted', ['seal' => $seal->name]));
    }
}
