@extends ('backend.layouts.app')

@section ('title', __('labels.backend.aftermarkets.management') . ' | ' . __('labels.backend.aftermarkets.create'))

@section('breadcrumb-links')
    @include('backend.aftermarket.includes.breadcrumb-links')
@endsection

@section('content')
{{ html()->modelForm($aftermarket, 'PATCH', route('admin.aftermarket.update', $aftermarket->id))->class('form-horizontal')->open() }}

    <div class="alert alert-info" role="alert">
        <i class="fa fa-info-circle"></i> Please fill up all fields to avoid any errors...
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.aftermarkets.management') }}
                        <small class="text-muted">{{ __('labels.backend.aftermarkets.create') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.aftermarkets.name'))->class('col-md-2 form-control-label')->for('name') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('name')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.aftermarkets.name'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.aftermarkets.model'))->class('col-md-2 form-control-label')->for('model') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('model')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.aftermarkets.model'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.aftermarkets.part_number'))->class('col-md-2 form-control-label')->for('part_number') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('part_number')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.aftermarkets.part_number'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.aftermarkets.reference_number'))->class('col-md-2 form-control-label')->for('reference_number') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('reference_number')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.aftermarkets.reference_number'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.aftermarkets.material_number'))->class('col-md-2 form-control-label')->for('material_number') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('material_number')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.aftermarkets.material_number'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.aftermarkets.serial_number'))->class('col-md-2 form-control-label')->for('serial_number') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('serial_number')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.aftermarkets.serial_number'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.aftermarkets.tag_number'))->class('col-md-2 form-control-label')->for('tag_number') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('tag_number')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.aftermarkets.tag_number'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.aftermarkets.ccn_number'))->class('col-md-2 form-control-label')->for('ccn_number') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('ccn_number')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.aftermarkets.ccn_number'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.aftermarkets.price'))->class('col-md-2 form-control-label')->for('price') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('price')
                                ->class('form-control numeric-input')
                                ->placeholder(__('validation.attributes.backend.aftermarkets.price'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.aftermarkets.company_name'))->class('col-md-2 form-control-label')->for('company_name') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('company_name')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.aftermarkets.company_name'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.aftermarkets.stock_number'))->class('col-md-2 form-control-label')->for('stock_number') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('stock_number')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.aftermarkets.stock_number'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.aftermarkets.description'))->class('col-md-2 form-control-label')->for('description') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('description')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.aftermarkets.description'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.aftermarkets.sap_number'))->class('col-md-2 form-control-label')->for('sap_number') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('sap_number')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.aftermarkets.sap_number'))
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
                    {{ form_cancel(route('admin.aftermarket.show', $aftermarket->id), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->form()->close() }}
@endsection