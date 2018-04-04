@extends ('backend.layouts.app')

@section ('title', __('labels.backend.buy-and-resale-proposals.management') . ' | ' . __('labels.backend.buy-and-resale-proposals.create'))

@section('breadcrumb-links')
    @include('backend.buy_and_resale_proposal.includes.breadcrumb-links')
@endsection

@section('content')
    {{ html()->form('POST', route('admin.buy-and-resale-proposal.store'))->class('form-horizontal')->open() }}

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
                        {{ html()->label(__('validation.attributes.backend.buy-and-resale-proposal.invoice_to'))->class('col-md-2 form-control-label')->for('invoice_to') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('invoice_to')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.buy-and-resale-proposal.invoice_to'))
                                ->attribute('maxlength', 100)
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
                        {{ html()->label(__('validation.attributes.backend.buy-and-resale-proposal.qrc_reference'))->class('col-md-2 form-control-label')->for('qrc_reference') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('qrc_reference')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.buy-and-resale-proposal.qrc_reference'))
                                ->attribute('maxlength', 60)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="">
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
                            @if (!empty($ordered_products))
                                @foreach ($ordered_products as $ordered_product)
                                <tr>
                                    <input type="hidden" name="buy_and_resale_proposal_itemmable_id[]" value="{{ $ordered_product->id }}-{{ $ordered_product->data_model }}">
                                    <td>{{ $ordered_product->id }}</td>
                                    <td>{{ $ordered_product->data_5 }}</td>
                                    <td>{{ $ordered_product->name }}</td>
                                    <td>
                                        <input type="text" class="form-control numeric-input" name="quantity[]">
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <select name="currency[]" id="currency-dropdown" class="form-control chosen-select">
                                                    <option value="PHP">PHP</option>
                                                    <option value="JPY">JPY</option>
                                                    <option value="USD">USD</option>
                                                    <option value="SGD">SGD</option>
                                                </select>
                                            </div>
                                            <input type="text" name="price[]" class="form-control numeric-input"
                                            value="{{ is_null($ordered_product->latest_price) ? '' : number_format($ordered_product->latest_price->price, 2) }}">
                                        </div>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control numeric-input" name="delivery_date[]">
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>

                    <hr>

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.buy-and-resale-proposal.validity'))->class('col-md-2 form-control-label')->for('validity') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('validity')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.buy-and-resale-proposal.validity'))
                                ->attribute('maxlength', 60)
                                ->required()
                            }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.buy-and-resale-proposal.payment_terms'))->class('col-md-2 form-control-label')->for('payment_terms') }}

                        <div class="col-sm-10">
                            {{
                                html()->text('payment_terms')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.buy-and-resale-proposal.payment_terms'))
                                ->attribute('maxlength', 60)
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
                    {{ form_cancel(route('admin.buy-and-resale-proposal.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.create')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
    {{ html()->form()->close() }}
@endsection