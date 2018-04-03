@extends ('backend.layouts.app')

@section ('title', __('labels.backend.seals.management') . ' | ' . __('labels.backend.seals.create'))

@section('breadcrumb-links')
    @include('backend.seal.includes.breadcrumb-links')
@endsection

@section('content')
{{ html()->modelForm($seal, 'PATCH', route('admin.seal.update', $seal->id))->class('form-horizontal')->open() }}

    <div class="alert alert-info" role="alert">
        <i class="fa fa-info-circle"></i> Please fill up all fields to avoid any errors...
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.seals.management') }}
                        <small class="text-muted">{{ __('labels.backend.seals.create') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.seals.name'))->class('col-md-2 form-control-label')->for('name') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('name')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.seals.name'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.seals.drawing_number'))->class('col-md-2 form-control-label')->for('drawing_number') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('drawing_number')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.seals.drawing_number'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.seals.size'))->class('col-md-2 form-control-label')->for('size') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('size')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.seals.size'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.seals.bom_number'))->class('col-md-2 form-control-label')->for('bom_number') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('bom_number')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.seals.bom_number'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.seals.end_user'))->class('col-md-2 form-control-label')->for('end_user') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('end_user')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.seals.end_user'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.seals.seal_type'))->class('col-md-2 form-control-label')->for('seal_type') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('seal_type')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.seals.seal_type'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.seals.material_number'))->class('col-md-2 form-control-label')->for('material_number') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('material_number')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.seals.material_number'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.seals.code'))->class('col-md-2 form-control-label')->for('code') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('code')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.seals.code'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.seals.model'))->class('col-md-2 form-control-label')->for('model') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('model')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.seals.model'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.seals.serial_number'))->class('col-md-2 form-control-label')->for('serial_number') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('serial_number')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.seals.serial_number'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.seals.tag'))->class('col-md-2 form-control-label')->for('tag') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('tag')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.seals.tag'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.seals.price'))->class('col-md-2 form-control-label')->for('price') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('price')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.seals.price'))
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
                    {{ form_cancel(route('admin.seal.show', $seal->id), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->form()->close() }}
@endsection