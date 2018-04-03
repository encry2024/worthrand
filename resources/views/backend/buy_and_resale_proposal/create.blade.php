@extends ('backend.layouts.app')

@section ('title', __('labels.backend.buy-and-resale-proposals.management') . ' | ' . __('labels.backend.buy-and-resale-proposals.create'))

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
                <div class="col-sm-7">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.buy-and-resale-proposals.management') }}
                        <small class="text-muted">{{ __('labels.backend.buy-and-resale-proposals.create') }}</small>
                    </h4>
                </div><!--col-->

                <div class="col-sm-5">
                    <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                        <a href="{{ route('admin.product.index') }}" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Add Product"><i class="fa fa-plus"></i></a>
                    </div><!--btn-toolbar-->
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.buy-and-resale-proposal.wpc_reference'))->class('col-md-2 form-control-label')->for('wpc_reference') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('wpc_reference')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.buy-and-resale-proposal.wpc_reference'))
                                ->attribute('maxlength', 60)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label class="col-md-2 form-control-label">Date</label>

                        <div class="col-sm-10">
                            <input type="text" id="date" value="{{ date('Y') }}" name="date" class="form-control" readOnly>
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.buy-and-resale-proposal.sold_to'))->class('col-md-2 form-control-label')->for('sold_to') }}

                        <div class="col-sm-10">
                            <select name="customer" id="customer-dropdown" class="form-control chosen-select">
                                <option value=""></option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label for="" class="col-md-2 form-control-label"></label>

                        <div class="col-sm-10">
                            <textarea name="sold_to_address" id="sold_to_address" class="form-control" placeholder="Sold to Address"></textarea>
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.buy-and-resale-proposal.rfq_number'))->class('col-md-2 form-control-label')->for('rfq_number') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('rfq_number')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.buy-and-resale-proposal.rfq_number'))
                                ->attribute('maxlength', 100)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.buy-and-resale-proposal.invoice_to'))->class('col-md-2 form-control-label')->for('invoice_to') }}

                        <div class="col-sm-10">
                            {{
                                HTML()->text('invoice_to')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.buy-and-resale-proposal.invoice_to'))
                                ->attribute('maxlength', 6)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label for="" class="col-md-2 form-control-label"></label>

                        <div class="col-sm-10">
                            <textarea name="invoice_to_address" id="invoice_to_address" class="form-control" placeholder="Invoice to Address"></textarea>
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.buy-and-resale-proposal.ship_to'))->class('col-md-2 form-control-label')->for('ship_to') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('ship_to')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.buy-and-resale-proposal.ship_to'))
                                ->attribute('maxlength', 60)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label class="col-md-2 form-control-label"></label>

                        <div class="col-sm-10">
                            <textarea name="ship_to_address" id="ship_to_address" class="form-control" placeholder="Ship to Address"></textarea>
                        </div>
                    </div><!--form-group-->

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <th>ITEM No#</th>
                                <th>MATERIAL NO#</th>
                                <th>DESCRIPTION</th>
                                <th>QUANTITY</th>
                                <th>PRICE</th>
                                <th>DELIVERY</th>
                            </thead>

                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

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