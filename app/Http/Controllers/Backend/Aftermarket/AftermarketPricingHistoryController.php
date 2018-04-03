<?php

namespace App\Http\Controllers\Backend\Aftermarket;

# Facades
use Illuminate\Http\Request;
use Auth;
# Controller
use App\Http\Controllers\Controller;
# Models
use App\Models\Aftermarket\AftermarketPricingHistory;
use App\Models\Aftermarket\Aftermarket;
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
use App\Repositories\Backend\Aftermarket\AftermarketRepository;
use App\Repositories\Backend\Aftermarket\AftermarketPricingHistoryRepository;

class AftermarketPricingHistoryController extends Controller
{
    protected $aftermarketRepository;
    protected $aftermarketPricingHistoryRepository;

    public function __construct(AftermarketRepository $aftermarketRepository, AftermarketPricingHistoryRepository $aftermarketPricingHistoryRepository)
    {
        $this->aftermarketRepository       = $aftermarketRepository;
        $this->aftermarketPricingHistoryRepository   = $aftermarketPricingHistoryRepository;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Aftermarket $aftermarket, CreateGeneralPricingHistory $request)
    {
        return view('backend.aftermarket.pricing_history.create')->withAftermarket($aftermarket);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGeneralPricingHistory $request, Aftermarket $aftermarket)
    {
        $this->aftermarketRepository->add_pricing_history($request->only(
            'po_number',
            'pricing_date',
            'price',
            'terms',
            'delivery',
            'fpd_reference',
            'wpc_reference'
        ), $aftermarket);

        return redirect()->route('admin.aftermarket.show', $aftermarket)->withFlashSuccess('Pricing History was successfully added to '.$aftermarket->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Aftermarket $aftermarket, AftermarketPricingHistory $pricing_history)
    {
        return view('backend.aftermarket.pricing_history.show')->withAftermarket($aftermarket)->withModel($pricing_history);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Aftermarket $aftermarket, AftermarketPricingHistory $pricing_history)
    {
        return view('backend.aftermarket.pricing_history.edit', compact('pricing_history'))->withAftermarket($aftermarket);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGeneralPricingHistory $request, Aftermarket $aftermarket, AftermarketPricingHistory $pricing_history)
    {
        $this->aftermarketRepository->update_pricing_history($request->only(
            'po_number',
            'pricing_date',
            'price',
            'terms',
            'delivery',
            'fpd_reference',
            'wpc_reference'
        ), $aftermarket, $pricing_history);

        return redirect()->back()->withFlashSuccess('Aftermarket Pricing History "'. $pricing_history->po_number .'" was successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aftermarket $aftermarket, AftermarketPricingHistory $pricing_history)
    {
        $this->aftermarketPricingHistoryRepository->deleteById($pricing_history->id);

        $auth_link  = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
        $asset_link = "<a href='".route('admin.aftermarket.show', $aftermarket->id)."'>".$aftermarket->name.'</a>';
        $model      = class_basename($aftermarket);

        event(new GeneralPricingHistoryDeleted($auth_link, $model, $pricing_history->po_number, $asset_link));

        return redirect()->route('admin.aftermarket.show', [$aftermarket->id])->withFlashSuccess($model . ' Pricing History "'. $pricing_history->po_number .'" was successfully deleted');
    }
}
