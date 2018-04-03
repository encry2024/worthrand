<?php

namespace App\Http\Controllers\Backend\Aftermarket;

use App\Models\Aftermarket\Aftermarket;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Aftermarket\AftermarketRepository;
use App\Http\Requests\Backend\Aftermarket\RestoreAftermarketRequest;
use App\Http\Requests\Backend\Aftermarket\ForceDeleteAftermarketRequest;
use App\Http\Requests\Backend\Aftermarket\ManageAftermarketRequest;

/**
 * Class AftermarketStatusController.
 */
class AftermarketStatusController extends Controller
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
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function getDeleted(ManageAftermarketRequest $request)
    {
        return view('backend.aftermarket.deleted')
            ->withAftermarkets($this->aftermarketRepository->getDeletedPaginated(25, 'id', 'asc'));
    }

    /**
     * @param Aftermarket              $deletedAftermarket
     * @param ManageAftermarketRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function delete(Aftermarket $deletedAftermarket, ForceDeleteAftermarketRequest $request)
    {
        $this->aftermarketRepository->forceDelete($deletedAftermarket);

        return redirect()->route('admin.aftermarket.deleted')->withFlashSuccess(__('alerts.backend.aftermarkets.deleted_permanently', ['aftermarket' => $deletedAftermarket->name]));
    }

    /**
     * @param Aftermarket              $deletedAftermarket
     * @param ManageAftermarketRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function restore(Aftermarket $deletedAftermarket, RestoreAftermarketRequest $request)
    {
        $this->aftermarketRepository->restore($deletedAftermarket);

        return redirect()->route('admin.aftermarket.index')->withFlashSuccess(__('alerts.backend.aftermarkets.restored', ['aftermarket' => $deletedAftermarket->name]));
    }
}
