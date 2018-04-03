<?php

namespace App\Http\Controllers\Backend\Seal;

use App\Models\Seal\Seal;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Seal\SealRepository;
use App\Http\Requests\Backend\Seal\RestoreSealRequest;
use App\Http\Requests\Backend\Seal\ForceDeleteSealRequest;
use App\Http\Requests\Backend\Seal\ManageSealRequest;

/**
 * Class SealStatusController.
 */
class SealStatusController extends Controller
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
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function getDeleted(ManageSealRequest $request)
    {
        return view('backend.seal.deleted')
            ->withSeals($this->sealRepository->getDeletedPaginated(25, 'id', 'asc'));
    }

    /**
     * @param Seal              $deletedSeal
     * @param ManageSealRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function delete(Seal $deletedSeal, ForceDeleteSealRequest $request)
    {
        $this->sealRepository->forceDelete($deletedSeal);

        return redirect()->route('admin.seal.deleted')->withFlashSuccess(__('alerts.backend.seals.deleted_permanently', ['seal' => $deletedSeal->name]));
    }

    /**
     * @param Seal              $deletedSeal
     * @param ManageSealRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function restore(Seal $deletedSeal, RestoreSealRequest $request)
    {
        $this->sealRepository->restore($deletedSeal);

        return redirect()->route('admin.seal.index')->withFlashSuccess(__('alerts.backend.seals.restored', ['seal' => $deletedSeal->name]));
    }
}
