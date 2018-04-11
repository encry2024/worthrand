@extends ('backend.layouts.app')

@section ('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.create'))

@section('breadcrumb-links')
    @include('backend.customer.includes.breadcrumb-links')
@endsection

@section('content')
{{ html()->form('POST', route('admin.auth.user.set-revenue', $user->id))->class('form-horizontal')->attribute('id', 'target_revenue_form')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.access.users.management') }}
                        <small class="text-muted">Target Revenue</small>
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                        <a href="#" class="btn btn-success ml-1" title="Update Target Revenue"
                        data-toggle="modal" data-target="#target_revenue_modal"><i class="fa fa-plus-circle"></i></a>
                    </div><!--btn-toolbar-->
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                        <label for="target_revenue" class="col-md-2 form-control-label">Current Revenue</label>
                        <div class="col-md-10">
                            <input value="{{ $user->target_revenues ? 'N/A' : number_format($user->target_revenues->last()->current_sale, 2) }}" type="text" name="target_revenue" class="form-control" id="current_target_revenue" disabled>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label for="target_revenue" class="col-md-2 form-control-label">Target Revenue</label>

                        <div class="col-md-10">
                            <input value="{{ $user->target_revenues ? 'N/A' : number_format($user->target_revenues->last()->target_sale, '2') }}" type="text" name="target_revenue" class="form-control" id="target_revenue" disabled>
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->

            <h5 class="card-title">Target Revenue History</h5>
            <div class="row mt-4 mb-4">
                <div class="col">
                    <table class="table table-striped">
                        <thead>
                            <th>Date</th>
                            <th>Collected</th>
                            <th>Collected From Proposal</th>
                        </thead>

                        <tbody>
                            @if (count($user->target_revenues))
                                @foreach ($user->target_revenues->last()->target_revenue_histories as $target_revenue_history)
                                <tr>
                                    <td>{{ date('F d, Y', strtotime($target_revenue_history->created_at)) }}</td>
                                    <td>{{ number_format($target_revenue_history->collected, '2') }}</td>
                                    <td>{{ $target_revenue_history->target_revenue_historable_type }}</td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3"><p class="text-center">There are no records for this user's target revenue.</p></td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!--card-body-->
    </div><!--card-->

    <div class="modal fade in" tabindex="-1" role="dialog" id="target_revenue_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Target Revenue</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="target_revenue" class="col-md-4 form-control-label">Current Revenue</label>

                        <div class="col-md-8">
                            <input value="{{ $user->target_revenues ? 'N/A' : $user->target_revenues->last()->current_sale }}" type="text" name="target_sale" class="form-control numeric-input" id="current_target_revenue">
                        </div><!--col-->
                    </div><!--form-group-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" onclick="$('#target_revenue_form').submit();">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
{{ html()->form()->close() }}
@endsection