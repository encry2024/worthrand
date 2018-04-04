<div class="col">

    @if (auth()->user()->roles_label == 'Secretary')
        <div class="form-group row">
            {{ html()->label(__('validation.attributes.backend.buy-and-resale-proposal.purchase_order'))->class('col-md-3 form-control-label')->for('purchase_order') }}

            <div class="col-sm-9">
                {{
                    html()->text('purchase_order')
                    ->class('form-control')
                    ->placeholder(__('validation.attributes.backend.buy-and-resale-proposal.purchase_order'))
                    ->attribute('maxlength', 60)
                    ->value($model->purchase_order)
                    ->required()
                }}
            </div>
        </div><!--form-group-->
    @else
        <div class="form-group row">
            {{ html()->label(__('validation.attributes.backend.buy-and-resale-proposal.purchase_order'))->class('col-md-3 form-control-label')->for('purchase_order') }}

            <div class="col-sm-9">
                {{
                    html()->text('purchase_order')
                    ->class('form-control')
                    ->placeholder(__('validation.attributes.backend.buy-and-resale-proposal.purchase_order'))
                    ->attribute('maxlength', 60)
                    ->attribute('readonly')
                    ->value($model->purchase_order)
                    ->required()
                }}
            </div>
        </div><!--form-group-->
    @endif

    <div class="form-group row">
        {{ html()->label(__('validation.attributes.backend.buy-and-resale-proposal.wpc_reference'))->class('col-md-3 form-control-label')->for('wpc_reference') }}

        <div class="col-sm-9">
            {{
                html()->text('wpc_reference')
                ->class('form-control')
                ->placeholder(__('validation.attributes.backend.buy-and-resale-proposal.wpc_reference'))
                ->attribute('maxlength', 60)
                ->attribute('readonly')
                ->value($model->wpc_reference)
                ->required()
            }}
        </div>
    </div><!--form-group-->

    <div class="form-group row">
        {{ html()->label(__('validation.attributes.backend.buy-and-resale-proposal.qrc_reference'))->class('col-md-3 form-control-label')->for('qrc_reference') }}

        <div class="col-sm-9">
            {{
                html()->text('qrc_reference')
                ->class('form-control')
                ->placeholder(__('validation.attributes.backend.buy-and-resale-proposal.qrc_reference'))
                ->attribute('maxlength', 60)
                ->attribute('readonly')
                ->value($model->qrc_reference)
                ->required()
            }}
        </div>
    </div><!--form-group-->

    <div class="form-group row">
        <label class="col-md-3 form-control-label">Date</label>

        <div class="col-sm-9">
            <input type="text" id="date" value="{{ date('Y') }}" name="date" class="form-control" readOnly>
        </div>
    </div><!--form-group-->

    <div class="form-group row">
        {{ html()->label(__('validation.attributes.backend.buy-and-resale-proposal.sold_to'))->class('col-md-3 form-control-label')->for('sold_to') }}

        <div class="col-sm-9">
            <input type="text" id="date" name="date" class="form-control" readOnly value="{{ $model->customer->name }}" readOnly>
        </div>
    </div><!--form-group-->

    <div class="form-group row">
        <label for="" class="col-md-3 form-control-label"></label>

        <div class="col-sm-9">
            <textarea name="sold_to_address" id="sold_to_address" class="form-control" placeholder="Sold to Address" readOnly>{{ $model->customer->address }}</textarea>
        </div>
    </div><!--form-group-->

    <div class="form-group row">
        {{ html()->label(__('validation.attributes.backend.buy-and-resale-proposal.invoice_to'))->class('col-md-3 form-control-label')->for('invoice_to') }}

        <div class="col-sm-9">
            {{
                html()->text('invoice_to')
                ->class('form-control')
                ->placeholder(__('validation.attributes.backend.buy-and-resale-proposal.invoice_to'))
                ->attribute('maxlength', 60)
                ->attribute('readonly')
                ->value($model->invoice_to)
                ->required()
            }}
        </div>
    </div><!--form-group-->

    <div class="form-group row">
        <label for="" class="col-md-3 form-control-label">Invoice Address</label>

        <div class="col-sm-9">
            <textarea name="sold_to_address" id="sold_to_address" class="form-control" placeholder="Sold to Address" readOnly>{{ $model->invoice_address }}</textarea>
        </div>
    </div><!--form-group-->

    <div class="form-group row">
        {{ html()->label(__('validation.attributes.backend.buy-and-resale-proposal.validity'))->class('col-md-3 form-control-label')->for('validity') }}

        <div class="col-sm-9">
            {{
                html()->text('validity')
                ->class('form-control')
                ->placeholder(__('validation.attributes.backend.buy-and-resale-proposal.validity'))
                ->attribute('maxlength', 60)
                ->attribute('readonly')
                ->value($model->validity)
                ->required()
            }}
        </div>
    </div><!--form-group-->

    <div class="form-group row">
        {{ html()->label(__('validation.attributes.backend.buy-and-resale-proposal.payment_terms'))->class('col-md-3 form-control-label')->for('payment_terms') }}

        <div class="col-sm-9">
            {{
                html()->text('payment_terms')
                ->class('form-control')
                ->placeholder(__('validation.attributes.backend.buy-and-resale-proposal.payment_terms'))
                ->attribute('maxlength', 60)
                ->attribute('readonly')
                ->value($model->payment_terms)
                ->required()
            }}
        </div>
    </div><!--form-group-->
</div>