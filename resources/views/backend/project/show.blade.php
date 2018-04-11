@extends ('backend.layouts.app')

@section ('title', __('labels.backend.projects.management') . ' | ' . __('labels.backend.projects.view'))

@section('breadcrumb-links')
    @include('backend.project.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.projects.management') }}
                        <small class="text-muted">{{ __('labels.backend.projects.view', ['project' => $model->name]) }}</small>
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group btn-group-sm" role="group" aria-label="Project Actions">
                            <a href="{{ route('admin.project.pricing_history.create', $model->id) }}" class="btn btn-primary ml-1" data-toggle="tooltip" title="Add Pricing History"><i class="fa fa-plus"></i></a>
                            <a href="{{ route('admin.project.edit', $model->id) }}" class="btn btn-success ml-1" data-toggle="tooltip" title="Edit Project"><i class="fa fa-pencil"></i></a>
                            @if ($model->trashed())
                                <a href="{{ route('admin.project.restore', $model->id) }}" name="confirm_item" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Restore Project"><i class="fa fa-refresh"></i></a>
                            @endif
                        </div>
                    </div><!--btn-toolbar-->
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4 mb-4">
                <div class="col">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-expanded="true"><i class="fa fa-user"></i> {{ __('labels.backend.projects.tabs.titles.overview') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#upload" role="tab" aria-controls="upload" aria-expanded="true"><i class="fa fa-upload"></i> Uploaded Files</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#pricing_history" role="tab" aria-controls="pricing_history" aria-expanded="true"><i class="fa fa-clock-o"></i> Pricing History</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#deleted_pricing_histories" role="tab" aria-controls="deleted_pricing_histories" aria-expanded="true"><i class="fa fa-trash"></i> Deleted Pricing Histories</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="overview" role="tabpanel" aria-expanded="true">
                            @include('backend.project.show.tabs.overview')
                        </div><!--tab-->

                        <div class="tab-pane" id="upload" role="tabpanel" aria-expanded="true">
                            @include('backend.project.show.tabs.upload')
                        </div><!--tab-->

                        <div class="tab-pane" id="pricing_history" role="tabpanel" aria-expanded="true">
                            @include('backend.project.show.tabs.pricing_history')
                        </div><!--tab-->

                        <div class="tab-pane" id="deleted_pricing_histories" role="tabpanel" aria-expanded="true">
                            @include('backend.project.show.tabs.deleted_pricing_histories')
                        </div><!--tab-->
                    </div><!--tab-content-->
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <small class="float-right text-muted">
                        <strong>{{ __('labels.backend.projects.tabs.content.overview.created_at') }}:</strong> {{ date('F d, Y (h:i A)', strtotime($model->created_at)) }},
                        <strong>{{ __('labels.backend.projects.tabs.content.overview.updated_at') }}:</strong> {{ date('F d, Y (h:i A)', strtotime($model->updated_at)) }}
                        @if ($model->trashed())
                            <strong>{{ __('labels.backend.projects.tabs.content.overview.deleted_at') }}:</strong> {{ date('F d, Y (h:i A)', strtotime($model->deleted_at)) }}
                        @endif
                    </small>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
@endsection

@push('after-scripts')
<script>
    Dropzone.autoDiscover = false;

    var dropzoneField = new Dropzone("#dropZ", {
        url: "{{ route('admin.project.upload', $model->id) }}",
        addRemoveLinks: true,
        dictDefaultMessage: "-Drag your files, or click to upload."
    });

    // $('.download_file').on('click', function(e) {
    //     e.preventDefault();
    // });
</script>
@endpush