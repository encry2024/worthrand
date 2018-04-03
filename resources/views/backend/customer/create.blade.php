@extends ('backend.layouts.app')

@section ('title', __('labels.backend.customers.management') . ' | ' . __('labels.backend.customers.create'))

@section('breadcrumb-links')
    @include('backend.customer.includes.breadcrumb-links')
@endsection

@section('content')
    {{ html()->form('POST', route('admin.customer.store'))->class('form-horizontal')->open() }}

    <div class="alert alert-info" role="alert">
        <i class="fa fa-info-circle"></i> Please fill up all fields to avoid any errors...
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.customers.management') }}
                        <small class="text-muted">{{ __('labels.backend.customers.create') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.customers.name'))->class('col-md-2 form-control-label')->for('name') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('name')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.customers.name'))
                                ->attribute('maxlength', 60)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.customers.city'))->class('col-md-2 form-control-label')->for('city') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('city')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.customers.city'))
                                ->attribute('maxlength', 30)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.customers.address'))->class('col-md-2 form-control-label')->for('address') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('address')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.customers.address'))
                                ->attribute('maxlength', 100)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.customers.postal_code'))->class('col-md-2 form-control-label')->for('postal_code') }}

                        <div class="col-sm-10">
                            {{
                                HTML()->text('postal_code')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.customers.postal_code'))
                                ->attribute('maxlength', 6)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.customers.plant_site_address'))->class('col-md-2 form-control-label')->for('plant_site_address') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('plant_site_address')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.customers.plant_site_address'))
                                ->attribute('maxlength', 100)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.customers.contact_person'))->class('col-md-2 form-control-label')->for('contact_person') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('contact_person')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.customers.contact_person'))
                                ->attribute('maxlength', 60)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.customers.position_of_contact_person'))->class('col-md-2 form-control-label')->for('position_of_contact_person') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('position_of_contact_person')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.customers.position_of_contact_person'))
                                ->attribute('maxlength', 30)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.customers.contact_number'))->class('col-md-2 form-control-label')->for('contact_number') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('contact_number')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.customers.contact_number'))
                                ->attribute('maxlength', 30)
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
                    {{ form_cancel(route('admin.customer.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.create')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
    {{ html()->form()->close() }}
@endsection