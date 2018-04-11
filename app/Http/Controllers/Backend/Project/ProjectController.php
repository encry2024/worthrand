<?php

namespace App\Http\Controllers\Backend\Project;

# Event
use App\Events\Backend\Project\ProjectDeleted;
# Facades
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Storage;
use File;
# Models
use App\Models\Project\Project;
use App\Models\Customer\Customer;
# Controllers
use App\Http\Controllers\Controller;
# Requests
use App\Http\Requests\Backend\Project\ManageProjectRequest;
use App\Http\Requests\Backend\Project\StoreProjectRequest;
use App\Http\Requests\Backend\Project\CreateProjectRequest;
use App\Http\Requests\Backend\Project\UpdateProjectRequest;
use App\Http\Requests\Backend\Project\DeleteProjectRequest;
use App\Http\Requests\Backend\Project\UploadProjectRequest;
# Repository
use App\Repositories\Backend\Project\ProjectRepository;

class ProjectController extends Controller
{
    protected $projectRepository;

    /**
     * ProjectController constructor.
     * @param $projectRepository
     */
    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ManageProjectRequest $request)
    {
        return view('backend.project.index')
            ->withProjects($this->projectRepository->getPaginatedProject());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreateProjectRequest $request)
    {
        $customers = Customer::all();

        if ($customers->count()) {
            return view('backend.project.create')->withCustomers($customers);
        } else {
            return redirect()->back()->withFlashDanger('Error: Cannot create project. You have '. count($customers) .' stored customers on the database. Add customer first <a href="'. route('admin.customer.create') .'" style="text-decoration: underline;">Click here to create a customer.</a>');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $this->projectRepository->create($request->except('_token'));

        return redirect()->route('admin.project.index')
            ->withFlashSuccess(__('alerts.backend.projects.created', ['project' => $request->name]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project, ManageProjectRequest $request)
    {
        if(!File::exists('storage/project/'.$project->id)) {
            $files = '';

            return view('backend.project.show')->withModel($project)->withFiles($files);
        } else {
            $files = collect(File::allFiles('storage/project/'.$project->id))->filter(function ($file) {
                return in_array($file->getExtension(), ['png', 'pdf', 'jpg']);
            })
            ->sortByDesc(function ($file) {
                return $file->getCTime();
            })
            ->map(function ($file) {
                return $file->getBaseName();
            });

            return view('backend.project.show')->withModel($project)->withFiles($files);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project, UpdateProjectRequest $request)
    {
        $customers = Customer::withTrashed()->get();

        return view('backend.project.edit')->withProject($project)->withCustomers($customers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $this->projectRepository->update($project, $request->except('_token', '_method'));

        return redirect()->back()->withFlashSuccess(__('alerts.backend.projects.updated', ['project' => $project->name]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, DeleteProjectRequest $request)
    {
        $this->projectRepository->deleteById($project->id);

        $auth_link = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
        $asset_link = "<a href='".route('admin.project.show', $project->id)."'>".$project->name.'</a>';

        event(new ProjectDeleted($auth_link, $asset_link));

        return redirect()->route('admin.project.deleted')->withFlashSuccess(__('alerts.backend.projects.deleted', ['project' => $project->name]));
    }

    public function uploadFile(Project $project, UploadProjectRequest $request)
    {
        $path = $request->file('file')->store('public/project/'.$project->id);

        return $path;
    }

    public function downloadFile(Project $project, $file, UploadProjectRequest $request)
    {
        return Storage::download('public/project/'.$project->id.'/'.$file);
    }
}
