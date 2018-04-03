<?php

namespace App\Http\Controllers\Backend\Seal;

# Facades
use Illuminate\Http\Request;
use Auth;
# Controller
use App\Http\Controllers\Controller;
# Models
use App\Models\Seal\SealPricingHistory;
use App\Models\Seal\Seal;
# Requests
use App\Http\Requests\Backend\PricingHistory\CreateGeneralPricingHistory;
use App\Http\Requests\Backend\PricingHistory\DeletedGeneralPricingHistory;
use App\Http\Requests\Backend\PricingHistory\StoreGeneralPricingHistory;
use App\Http\Requests\Backend\PricingHistory\EditGeneralPricingHistory;
use App\Http\Requests\Backend\PricingHistory\UpdateGeneralPricingHistory;
use App\Http\Requests\Backend\PricingHistory\RestoreGeneralPricingHistory;
use App\Http\Requests\Backend\PricingHistory\ForceDeleteGeneralPricingHistory;
# Events
use App\Events\Backend\PricingHistory\GeneralPricingHistoryDeleted;
# Repositories
use App\Repositories\Backend\Seal\SealRepository;
use App\Repositories\Backend\Seal\SealPricingHistoryRepository;

class SealPricingHistoryController extends Controller
{
    protected $sealRepository;
    protected $sealPricingHistoryRepository;

    public function __construct(SealRepository $sealRepository, SealPricingHistoryRepository $sealPricingHistoryRepository)
    {
        $this->sealRepository       = $sealRepository;
        $this->sealPricingHistoryRepository   = $sealPricingHistoryRepository;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Seal $seal, CreateGeneralPricingHistory $request)
    {
        return view('backend.seal.pricing_history.create')->withSeal($seal);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGeneralPricingHistory $request, Seal $seal)
    {
        $this->sealRepository->add_pricing_history($request->only(
            'po_number',
            'pricing_date',
            'price',
            'terms',
            'delivery',
            'fpd_reference',
            'wpc_reference'
        ), $seal);

        return redirect()->route('admin.seal.show', $seal)->withFlashSuccess('Pricing History was successfully added to '.$seal->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Seal $seal, SealPricingHistory $pricing_history)
    {
        return view('backend.seal.pricing_history.show')->withSeal($seal)->withModel($pricing_history);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Seal $seal, SealPricingHistory $pricing_history)
    {
        return view('backend.seal.pricing_history.edit', compact('pricing_history'))->withSeal($seal);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGeneralPricingHistory $request, Seal $seal, SealPricingHistory $pricing_history)
    {
        $this->sealRepository->update_pricing_history($request->only(
            'po_number',
            'pricing_date',
            'price',
            'terms',
            'delivery',
            'fpd_reference',
            'wpc_reference'
        ), $seal, $pricing_history);

        return redirect()->back()->withFlashSuccess('Seal Pricing History "'. $pricing_history->po_number .'" was successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seal $seal, SealPricingHistory $pricing_history)
    {
        $this->sealPricingHistoryRepository->deleteById($pricing_history->id);

        $auth_link  = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
        $asset_link = "<a href='".route('admin.seal.show', $seal->id)."'>".$seal->name.'</a>';
        $model      = class_basename($seal);

        event(new GeneralPricingHistoryDeleted($auth_link, $model, $pricing_history->po_number, $asset_link));

        return redirect()->route('admin.seal.show', [$seal->id])->withFlashSuccess($model . ' Pricing History "'. $pricing_history->po_number .'" was successfully deleted');
    }
}
