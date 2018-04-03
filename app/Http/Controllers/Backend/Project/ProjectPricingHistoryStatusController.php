<?php

namespace App\Http\Controllers\Backend\Project;

use App\Models\Project\Project;
use App\Models\Project\ProjectPricingHistory;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Project\ProjectRepository;
use App\Http\Requests\Backend\PricingHistory\RestoreGeneralPricingHistory;
use App\Http\Requests\Backend\PricingHistory\ForceDeleteGeneralPricingHistory;
use App\Http\Requests\Backend\Project\ManageProjectRequest;

/**
 * Class ProjectPricingHistoryStatusController.
 */
class ProjectPricingHistoryStatusController extends Controller
{
    /**
     * @var ProjectRepository
     */
    protected $projectRepository;

    /**
     * @param ProjectRepository $projectRepository
     */
    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    /**
     * @param Project              $deletedProject
     * @param ManageProjectRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function showDeleted(Project $project, ProjectPricingHistory $deletedProjectPricingHistory, ManageProjectRequest $request)
    {
        return view('backend.project.pricing_history.show')->withProject($project)->withModel($deletedProjectPricingHistory);
    }

    /**
     * @param Project              $deletedProject
     * @param ManageProjectRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function delete(Project $project, ProjectPricingHistory $deletedProjectPricingHistory, ForceDeleteGeneralPricingHistory $request)
    {
        $this->projectRepository->forceDeletePricingHistory($deletedProjectPricingHistory);

        return redirect()->route('admin.project.show', $project->id)->withFlashSuccess('Project Pricing History "'. $deletedProjectPricingHistory->po_number .'" was permanently deleted');
    }

    /**
     * @param Project              $deletedProject
     * @param ManageProjectRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function restore(Project $project, ProjectPricingHistory $deletedProjectPricingHistory, RestoreGeneralPricingHistory $request)
    {
        $this->projectRepository->restorePricingHistory($project, $deletedProjectPricingHistory);

        return redirect()->route('admin.project.show', $project->id)->withFlashSuccess('Project Pricing History "'. $deletedProjectPricingHistory->po_number .'" was successfully restored');
    }
}
