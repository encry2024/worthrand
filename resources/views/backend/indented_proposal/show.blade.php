@extends ('backend.layouts.app')

@section ('title', __('labels.backend.indented_proposals.management') . ' | ' . __('labels.backend.indented_proposals.view'))

@section('breadcrumb-links')
    @include('backend.indented_proposal.includes.breadcrumb-links')
@endsection

@section('content')
    @if ($model->collection_status == "PENDING")
        <div class="alert alert-info" role="alert">OVERALL STATUS: {{ strtoupper($model->collection_status) }}</div>
    @elseif ($model->collection_status == "ACCEPTED")
        <div class="alert alert-primary" role="alert">OVERALL STATUS: {{ strtoupper($model->collection_status) }}</div>
    @elseif ($model->collection_status == "FOR-COLLECTION")
        <div class="alert alert-success" role="alert">OVERALL STATUS: {{ strtoupper($model->collection_status) }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.indented_proposals.management') }}
                        <small class="text-muted">{{ __('labels.backend.indented_proposals.view', ['indented_proposal' => $model->name]) }}</small>
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group btn-group-sm" role="group" aria-label="Project Actions">
                            @if (auth()->user()->roles_label == 'Administrator')
                                <a href="#" class="btn btn-success ml-1 text-white" data-toggle="tooltip" title="Accept Proposal" id="accept_proposal" data-value="{{ $model->id }}"><i class="fa fa-check"></i></a>
                                <form action="{{ route('admin.indented-proposal.accept', $model->id) }}" method="POST" name="accept_proposal">
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH') }}
                                </form>
                                <a href="#" class="btn btn-danger ml-1" data-toggle="tooltip" title="Cancel Proposal" id="cancel_proposal" data-value="{{ $model->id }}"><i class="fa fa-ban"></i></a>
                                @if ($model->trashed())
                                    <a href="{{ route('admin.indented_proposal.restore', $model->id) }}" name="confirm_item" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Restore Project"><i class="fa fa-refresh"></i></a>
                                @endif
                            @elseif (auth()->user()->roles_label == 'Secretary')
                                <a href="#" class="btn btn-success ml-1 text-white" data-toggle="tooltip" title="Accept Proposal" id="accept_proposal" data-value="{{ $model->id }}"><i class="fa fa-check"></i></a>
                                <form action="{{ route('admin.indented-proposal.send-to-assistant', $model->id) }}" method="POST" name="accept_proposal">
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH') }}
                                </form>
                                <a href="#" class="btn btn-danger ml-1" data-toggle="tooltip" title="Cancel Proposal" id="cancel_proposal" data-value="{{ $model->id }}"><i class="fa fa-ban"></i></a>
                            @elseif (auth()->user()->roles_label == 'Assistant')
                                <a href="#" class="btn btn-success ml-1 text-white" data-toggle="tooltip" title="Accept Proposal" id="accept_proposal" data-value="{{ $model->id }}"><i class="fa fa-check"></i></a>
                                <form action="{{ route('admin.indented-proposal.send-to-collection', $model->id) }}" method="POST" name="accept_proposal">
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH') }}
                                </form>
                                <a href="#" class="btn btn-danger ml-1" data-toggle="tooltip" title="Cancel Proposal" id="cancel_proposal" data-value="{{ $model->id }}"><i class="fa fa-ban"></i></a>
                            @elseif (auth()->user()->roles_label == 'Collection')
                                <a href="#" class="btn btn-success ml-1 text-white" data-toggle="tooltip" title="Accept Proposal" id="accept_proposal" data-value="{{ $model->id }}"><i class="fa fa-check"></i></a>
                                <form action="{{ route('admin.indented-proposal.accept', $model->id) }}" method="POST" name="accept_proposal">
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH') }}
                                </form>
                                <a href="#" class="btn btn-danger ml-1" data-toggle="tooltip" title="Cancel Proposal" id="cancel_proposal" data-value="{{ $model->id }}"><i class="fa fa-ban"></i></a>
                            @endif
                        </div>
                    </div><!--btn-toolbar-->
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4 mb-4">
                <div class="col">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-expanded="true"><i class="fa fa-clipboard"></i> {{ __('labels.backend.indented_proposals.tabs.titles.overview') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#purchased_products" role="tab" aria-controls="purchased_products" aria-expanded="true"><i class="fa fa-cart"></i> Purchased Products</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="overview" role="tabpanel" aria-expanded="true">
                            @include('backend.indented_proposal.show.tabs.overview')
                        </div><!--tab-->

                        <div class="tab-pane" id="purchased_products" role="tabpanel" aria-expanded="true">
                            @include('backend.indented_proposal.show.tabs.purchased_products')
                        </div><!--tab-->
                    </div><!--tab-content-->
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <small class="float-right text-muted">
                        <strong>{{ __('labels.backend.indented_proposals.tabs.content.overview.created_at') }}:</strong> {{ date('F d, Y (h:i A)', strtotime($model->created_at)) }},
                        <strong>{{ __('labels.backend.indented_proposals.tabs.content.overview.updated_at') }}:</strong> {{ date('F d, Y (h:i A)', strtotime($model->updated_at)) }}
                        @if ($model->trashed())
                            <strong>{{ __('labels.backend.indented_proposals.tabs.content.overview.deleted_at') }}:</strong> {{ date('F d, Y (h:i A)', strtotime($model->deleted_at)) }}
                        @endif
                    </small>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
@endsection

@push('after-scripts')
    @include('backend.indented_proposal.scripts.scripts')
@endpush
