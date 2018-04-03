<?php

namespace App\Http\Controllers\Backend\Project;

use App\Models\Project\Project;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Project\ProjectRepository;
use App\Http\Requests\Backend\Project\RestoreProjectRequest;
use App\Http\Requests\Backend\Project\ForceDeleteProjectRequest;
use App\Http\Requests\Backend\Project\ManageProjectRequest;

/**
 * Class ProjectStatusController.
 */
class ProjectStatusController extends Controller
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
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function getDeleted(ManageProjectRequest $request)
    {
        return view('backend.project.deleted')
            ->withProjects($this->projectRepository->getDeletedPaginated(25, 'id', 'asc'));
    }

    /**
     * @param Project              $deletedProject
     * @param ManageProjectRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function delete(Project $deletedProject, ForceDeleteProjectRequest $request)
    {
        $this->projectRepository->forceDelete($deletedProject);

        return redirect()->route('admin.project.deleted')->withFlashSuccess(__('alerts.backend.projects.deleted_permanently', ['project' => $deletedProject->name]));
    }

    /**
     * @param Project              $deletedProject
     * @param ManageProjectRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function restore(Project $deletedProject, RestoreProjectRequest $request)
    {
        $this->projectRepository->restore($deletedProject);

        return redirect()->route('admin.project.index')->withFlashSuccess(__('alerts.backend.projects.restored', ['project' => $deletedProject->name]));
    }
}
