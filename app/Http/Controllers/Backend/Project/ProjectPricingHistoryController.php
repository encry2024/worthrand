<?php

namespace App\Http\Controllers\Backend\Project;

# Facades
use Illuminate\Http\Request;
use Auth;
# Controller
use App\Http\Controllers\Controller;
# Models
use App\Models\Project\ProjectPricingHistory;
use App\Models\Project\Project;
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
use App\Repositories\Backend\Project\ProjectRepository;
use App\Repositories\Backend\Project\ProjectPricingHistoryRepository;

class ProjectPricingHistoryController extends Controller
{
    protected $projectRepository;
    protected $projectPricingHistoryRepository;

    public function __construct(ProjectRepository $projectRepository, ProjectPricingHistoryRepository $projectPricingHistoryRepository)
    {
        $this->projectRepository       = $projectRepository;
        $this->projectPricingHistoryRepository   = $projectPricingHistoryRepository;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project, CreateGeneralPricingHistory $request)
    {
        return view('backend.project.pricing_history.create')->withProject($project);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGeneralPricingHistory $request, Project $project)
    {
        $this->projectRepository->add_pricing_history($request->only(
            'po_number',
            'pricing_date',
            'price',
            'terms',
            'delivery',
            'fpd_reference',
            'wpc_reference'
        ), $project);

        return redirect()->route('admin.project.show', $project)->withFlashSuccess('Pricing History was successfully added to '.$project->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project, ProjectPricingHistory $pricing_history)
    {
        return view('backend.project.pricing_history.show')->withProject($project)->withModel($pricing_history);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project, ProjectPricingHistory $pricing_history)
    {
        return view('backend.project.pricing_history.edit', compact('pricing_history'))->withProject($project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGeneralPricingHistory $request, Project $project, ProjectPricingHistory $pricing_history)
    {
        $this->projectRepository->update_pricing_history($request->only(
            'po_number',
            'pricing_date',
            'price',
            'terms',
            'delivery',
            'fpd_reference',
            'wpc_reference'
        ), $project, $pricing_history);

        return redirect()->back()->withFlashSuccess('Project Pricing History "'. $pricing_history->po_number .'" was successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, ProjectPricingHistory $pricing_history)
    {
        $this->projectPricingHistoryRepository->deleteById($pricing_history->id);

        $auth_link  = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
        $asset_link = "<a href='".route('admin.project.show', $project->id)."'>".$project->name.'</a>';
        $model      = class_basename($project);

        event(new GeneralPricingHistoryDeleted($auth_link, $model, $pricing_history->po_number, $asset_link));

        return redirect()->route('admin.project.show', [$project->id])->withFlashSuccess($model . ' Pricing History "'. $pricing_history->po_number .'" was successfully deleted');
    }
}
