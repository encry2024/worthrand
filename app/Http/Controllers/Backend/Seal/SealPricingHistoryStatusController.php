<?php

namespace App\Http\Controllers\Backend\Seal;

use App\Models\Seal\Seal;
use App\Models\Seal\SealPricingHistory;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Seal\SealRepository;
use App\Http\Requests\Backend\PricingHistory\RestoreGeneralPricingHistory;
use App\Http\Requests\Backend\PricingHistory\ForceDeleteGeneralPricingHistory;
use App\Http\Requests\Backend\Seal\ManageSealRequest;

/**
 * Class SealPricingHistoryStatusController.
 */
class SealPricingHistoryStatusController extends Controller
{
    /**
     * @var SealRepository
     */
    protected $sealRepository;

    /**
     * @param SealRepository $sealRepository
     */
    public function __construct(SealRepository $sealRepository)
    {
        $this->sealRepository = $sealRepository;
    }

    /**
     * @param Seal              $deletedSeal
     * @param ManageSealRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function showDeleted(Seal $seal, SealPricingHistory $deletedSealPricingHistory, ManageSealRequest $request)
    {
        return view('backend.seal.pricing_history.show')->withSeal($seal)->withModel($deletedSealPricingHistory);
    }

    /**
     * @param Seal              $deletedSeal
     * @param ManageSealRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function delete(Seal $seal, SealPricingHistory $deletedSealPricingHistory, ForceDeleteGeneralPricingHistory $request)
    {
        $this->sealRepository->forceDeletePricingHistory($deletedSealPricingHistory);

        return redirect()->route('admin.seal.show', $seal->id)->withFlashSuccess('Seal Pricing History "'. $deletedSealPricingHistory->po_number .'" was permanently deleted');
    }

    /**
     * @param Seal              $deletedSeal
     * @param ManageSealRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function restore(Seal $seal, SealPricingHistory $deletedSealPricingHistory, RestoreGeneralPricingHistory $request)
    {
        $this->sealRepository->restorePricingHistory($seal, $deletedSealPricingHistory);

        return redirect()->route('admin.seal.show', $seal->id)->withFlashSuccess('Seal Pricing History "'. $deletedSealPricingHistory->po_number .'" was successfully restored');
    }
}
