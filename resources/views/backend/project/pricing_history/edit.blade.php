@extends ('backend.layouts.app')

@section ('title', __('labels.backend.projects.management') . ' | ' . __('labels.backend.projects.create'))

@section('breadcrumb-links')
    @include('backend.project.includes.breadcrumb-links')
@endsection

@section('content')
{{ html()->modelForm($pricing_history, 'PATCH', route('admin.project.pricing_history.update', [$project->id, $pricing_history->id]))->class('form-horizontal')->open() }}

    <div class="alert alert-info" role="alert">
        <i class="fa fa-info-circle"></i> Please fill up all fields to avoid any errors...
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ $project->name }}
                        <small class="text-muted">Add Pricing History</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.pricing_history.po_number'))->class('col-md-2 form-control-label')->for('po_number') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('po_number')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.pricing_history.po_number'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.pricing_history.pricing_date'))->class('col-md-2 form-control-label')->for('pricing_date') }}

                        <div class="col-sm-10">
                            {{
                                html()->date('pricing_date')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.pricing_history.pricing_date'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.pricing_history.price'))->class('col-md-2 form-control-label')->for('price') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('price')
                                ->class('form-control numeric-input')
                                ->placeholder(__('validation.attributes.backend.pricing_history.price'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.pricing_history.terms'))->class('col-md-2 form-control-label')->for('terms') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('terms')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.pricing_history.terms'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.pricing_history.delivery'))->class('col-md-2 form-control-label')->for('delivery') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('delivery')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.pricing_history.delivery'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.pricing_history.fpd_reference'))->class('col-md-2 form-control-label')->for('fpd_reference') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('fpd_reference')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.pricing_history.fpd_reference'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.pricing_history.wpc_reference'))->class('col-md-2 form-control-label')->for('wpc_reference') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('wpc_reference')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.pricing_history.wpc_reference'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer clearfix">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.project.pricing_history.show', [$project->id, $pricing_history->id]), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->form()->close() }}
@endsection