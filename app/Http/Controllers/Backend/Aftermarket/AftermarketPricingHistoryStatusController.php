<?php

namespace App\Http\Controllers\Backend\Aftermarket;

use App\Models\Aftermarket\Aftermarket;
use App\Models\Aftermarket\AftermarketPricingHistory;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Aftermarket\AftermarketRepository;
use App\Http\Requests\Backend\PricingHistory\RestoreGeneralPricingHistory;
use App\Http\Requests\Backend\PricingHistory\ForceDeleteGeneralPricingHistory;
use App\Http\Requests\Backend\Aftermarket\ManageAftermarketRequest;

/**
 * Class AftermarketPricingHistoryStatusController.
 */
class AftermarketPricingHistoryStatusController extends Controller
{
    /**
     * @var AftermarketRepository
     */
    protected $aftermarketRepository;

    /**
     * @param AftermarketRepository $aftermarketRepository
     */
    public function __construct(AftermarketRepository $aftermarketRepository)
    {
        $this->aftermarketRepository = $aftermarketRepository;
    }

    /**
     * @param Aftermarket              $deletedAftermarket
     * @param ManageAftermarketRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function showDeleted(Aftermarket $aftermarket, AftermarketPricingHistory $deletedAftermarketPricingHistory, ManageAftermarketRequest $request)
    {
        return view('backend.aftermarket.pricing_history.show')->withAftermarket($aftermarket)->withModel($deletedAftermarketPricingHistory);
    }

    /**
     * @param Aftermarket              $deletedAftermarket
     * @param ManageAftermarketRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function delete(Aftermarket $aftermarket, AftermarketPricingHistory $deletedAftermarketPricingHistory, ForceDeleteGeneralPricingHistory $request)
    {
        $this->aftermarketRepository->forceDeletePricingHistory($deletedAftermarketPricingHistory);

        return redirect()->route('admin.aftermarket.show', $aftermarket->id)->withFlashSuccess('Aftermarket Pricing History "'. $deletedAftermarketPricingHistory->po_number .'" was permanently deleted');
    }

    /**
     * @param Aftermarket              $deletedAftermarket
     * @param ManageAftermarketRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function restore(Aftermarket $aftermarket, AftermarketPricingHistory $deletedAftermarketPricingHistory, RestoreGeneralPricingHistory $request)
    {
        $this->aftermarketRepository->restorePricingHistory($aftermarket, $deletedAftermarketPricingHistory);

        return redirect()->route('admin.aftermarket.show', $aftermarket->id)->withFlashSuccess('Aftermarket Pricing History "'. $deletedAftermarketPricingHistory->po_number .'" was successfully restored');
    }
}
