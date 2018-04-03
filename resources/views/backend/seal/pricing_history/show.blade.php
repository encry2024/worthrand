@extends ('backend.layouts.app')

@section ('title', __('labels.backend.seals.management') . ' | ' . __('labels.backend.seals.view'))

@section('breadcrumb-links')
    @include('backend.seal.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-7">
                    <h4 class="card-title mb-0">
                        Seal Pricing History Management
                        <small class="text-muted">PO Number: {{ $model->po_number }}</small>
                    </h4>
                </div><!--col-->

                <div class="col-sm-5">
                    <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                        
                        {!! $model->primary_action_buttons !!}
                    </div><!--btn-toolbar-->
                </div><!--col-->
            </div><!--row-->
            
            <hr>

            <div class="row mt-4 mb-4">
                <div class="col">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-expanded="true"><i class="fa fa-user"></i> Overview</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="overview" role="tabpanel" aria-expanded="true">
                            @include('backend.seal.pricing_history.show.tabs.overview')
                        </div><!--tab-->
                    </div><!--tab-content-->
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <small class="float-right text-muted">
                        <strong>Date Created:</strong> {{ date('F d, Y (h:i A)', strtotime($model->created_at)) }},
                        <strong>Date Updated:</strong> {{ date('F d, Y (h:i A)', strtotime($model->updated_at)) }}
                        @if ($model->trashed())
                            <strong>Date Deleted:</strong> {{ date('F d, Y (h:i A)', strtotime($model->deleted_at)) }}
                        @endif
                    </small>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
@endsection
