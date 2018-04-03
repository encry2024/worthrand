@extends ('backend.layouts.app')

@section ('title', __('labels.backend.projects.management') . ' | ' . __('labels.backend.projects.create'))

@section('breadcrumb-links')
    @include('backend.project.includes.breadcrumb-links')
@endsection

@section('content')
{{ html()->form('POST', route('admin.project.store'))->class('form-horizontal')->open() }}

    <div class="alert alert-info" role="alert">
        <i class="fa fa-info-circle"></i> Please fill up all fields to avoid any errors...
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.projects.management') }}
                        <small class="text-muted">{{ __('labels.backend.projects.create') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.projects.customer'))->class('col-md-2 form-control-label')->for('customer') }}

                        <div class="col-md-10">
                            <select name="customer" id="customer-dropdown" class="form-control chosen-select">
                                <option value=""></option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.projects.name'))->class('col-md-2 form-control-label')->for('name') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('name')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.projects.name'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.projects.source'))->class('col-md-2 form-control-label')->for('source') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('source')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.projects.source'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.projects.address_1'))->class('col-md-2 form-control-label')->for('address_1') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('address_1')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.projects.address_1'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.projects.contact_person_1'))->class('col-md-2 form-control-label')->for('contact_person_1') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('contact_person_1')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.projects.contact_person_1'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.projects.contact_number_1'))->class('col-md-2 form-control-label')->for('contact_number_1') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('contact_number_1')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.projects.contact_number_1'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.projects.email_1'))->class('col-md-2 form-control-label')->for('email_1') }}

                        <div class="col-sm-10">
                            {{
                                html()->email('email_1')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.projects.email_1'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.projects.consultant'))->class('col-md-2 form-control-label')->for('consultant') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('consultant')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.projects.consultant'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.projects.address_2'))->class('col-md-2 form-control-label')->for('address_2') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('address_2')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.projects.address_2'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.projects.contact_person_2'))->class('col-md-2 form-control-label')->for('contact_person_2') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('contact_person_2')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.projects.contact_person_2'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.projects.contact_number_2'))->class('col-md-2 form-control-label')->for('contact_number_2') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('contact_number_2')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.projects.contact_number_2'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.projects.email_2'))->class('col-md-2 form-control-label')->for('email_2') }}

                        <div class="col-sm-10">
                            {{
                                html()->email('email_2')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.projects.email_2'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.projects.shorted_list_epc'))->class('col-md-2 form-control-label')->for('shorted_list_epc') }}

                        <div class="col-sm-10">
                            {{
                                html()->textarea('shorted_list_epc')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.projects.shorted_list_epc'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.projects.address_3'))->class('col-md-2 form-control-label')->for('address_3') }}

                        <div class="col-sm-10">
                            {{
                                html()->textarea('address_3')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.projects.address_3'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.projects.contact_person_3'))->class('col-md-2 form-control-label')->for('contact_person_3') }}

                        <div class="col-sm-10">
                            {{
                                html()->textarea('contact_person_3')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.projects.contact_person_3'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.projects.contact_number_3'))->class('col-md-2 form-control-label')->for('contact_number_3') }}

                        <div class="col-sm-10">
                            {{
                                html()->textarea('contact_number_3')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.projects.contact_number_3'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.projects.email_3'))->class('col-md-2 form-control-label')->for('email_3') }}

                        <div class="col-sm-10">
                            {{
                                html()->textarea('email_3')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.projects.email_3'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.projects.approved_vendors_list'))->class('col-md-2 form-control-label')->for('approved_vendors_list') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('approved_vendors_list')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.projects.approved_vendors_list'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.projects.requirements_coor'))->class('col-md-2 form-control-label')->for('requirements_coor') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('requirements_coor')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.projects.requirements_coor'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.projects.epc_award'))->class('col-md-2 form-control-label')->for('epc_award') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('epc_award')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.projects.epc_award'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.projects.award_date'))->class('col-md-2 form-control-label')->for('award_date') }}

                        <div class="col-sm-10">
                            {{
                                html()->date('award_date')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.projects.award_date'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.projects.implementation_date'))->class('col-md-2 form-control-label')->for('implementation_date') }}

                        <div class="col-sm-10">
                            {{
                                html()->date('implementation_date')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.projects.implementation_date'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.projects.execution_date'))->class('col-md-2 form-control-label')->for('execution_date') }}

                        <div class="col-sm-10">
                            {{
                                html()->date('execution_date')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.projects.execution_date'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.projects.status'))->class('col-md-2 form-control-label')->for('status') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('status')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.projects.status'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.projects.bu'))->class('col-md-2 form-control-label')->for('bu') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('bu')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.projects.bu'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.projects.bu_reference'))->class('col-md-2 form-control-label')->for('bu_reference') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('bu_reference')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.projects.bu_reference'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.projects.wpc_reference'))->class('col-md-2 form-control-label')->for('wpc_reference') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('wpc_reference')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.projects.wpc_reference'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.projects.affinity_reference'))->class('col-md-2 form-control-label')->for('affinity_reference') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('affinity_reference')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.projects.affinity_reference'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.projects.value'))->class('col-md-2 form-control-label')->for('value') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('value')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.projects.value'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.projects.reference_number'))->class('col-md-2 form-control-label')->for('reference_number') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('reference_number')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.projects.reference_number'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.projects.types_of_sales'))->class('col-md-2 form-control-label')->for('types_of_sales') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('types_of_sales')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.projects.types_of_sales'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.projects.tag_number'))->class('col-md-2 form-control-label')->for('tag_number') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('tag_number')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.projects.tag_number'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.projects.application'))->class('col-md-2 form-control-label')->for('application') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('application')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.projects.application'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.projects.pump_model'))->class('col-md-2 form-control-label')->for('pump_model') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('pump_model')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.projects.pump_model'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.projects.serial_number'))->class('col-md-2 form-control-label')->for('serial_number') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('serial_number')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.projects.serial_number'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.projects.competitors'))->class('col-md-2 form-control-label')->for('competitors') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('competitors')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.projects.competitors'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.projects.final_result'))->class('col-md-2 form-control-label')->for('final_result') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('final_result')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.projects.final_result'))
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
                    {{ form_cancel(route('admin.project.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.create')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->form()->close() }}
@endsection