<div class="col">
    <div class="form-group row">
        {{ html()->label(__('validation.attributes.backend.indented-proposals.order_entry_no'))->class('col-md-3 form-control-label')->for('order_entry_no') }}

        <div class="col-sm-9">
            {{
                html()->text('order_entry_no')
                ->class('form-control')
                ->placeholder(__('validation.attributes.backend.indented-proposals.order_entry_no'))
                ->attribute('maxlength', 60)
                ->attribute('readonly')
                ->value($model->order_entry_no)
                ->required()
            }}
        </div>
    </div><!--form-group-->

    <hr>

    @if (auth()->user()->roles_label == 'Secretary')
        <div class="form-group row">
            {{ html()->label(__('validation.attributes.backend.indented-proposals.wpc_reference'))->class('col-md-3 form-control-label')->for('wpc_reference') }}

            <div class="col-sm-9">
                {{
                    html()->text('wpc_reference')
                    ->class('form-control')
                    ->placeholder(__('validation.attributes.backend.indented-proposals.wpc_reference'))
                    ->attribute('maxlength', 60)
                    ->value($model->wpc_reference)
                    ->required()
                }}
            </div>
        </div><!--form-group-->
    @else
        <div class="form-group row">
            {{ html()->label(__('validation.attributes.backend.indented-proposals.wpc_reference'))->class('col-md-3 form-control-label')->for('wpc_reference') }}

            <div class="col-sm-9">
                {{
                    html()->text('wpc_reference')
                    ->class('form-control')
                    ->placeholder(__('validation.attributes.backend.indented-proposals.wpc_reference'))
                    ->attribute('maxlength', 60)
                    ->attribute('readonly')
                    ->value($model->wpc_reference)
                    ->required()
                }}
            </div>
        </div><!--form-group-->
    @endif

    <div class="form-group row">
        <label class="col-md-3 form-control-label">Date</label>

        <div class="col-sm-9">
            <input type="text" id="date" value="{{ date('Y') }}" name="date" class="form-control" readOnly>
        </div>
    </div><!--form-group-->

    <div class="form-group row">
        {{ html()->label(__('validation.attributes.backend.indented-proposals.sold_to'))->class('col-md-3 form-control-label')->for('sold_to') }}

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
        {{ html()->label(__('validation.attributes.backend.indented-proposals.rfq_number'))->class('col-md-3 form-control-label')->for('rfq_number') }}

        <div class="col-sm-9">
            {{
                html()->text('rfq_number')
                ->class('form-control')
                ->placeholder(__('validation.attributes.backend.indented-proposals.rfq_number'))
                ->attribute('maxlength', 100)
                ->attribute('readOnly')
                ->value($model->rfq_number)
                ->required()
            }}
        </div>
    </div><!--form-group-->

    <div class="form-group row">
        {{ html()->label(__('validation.attributes.backend.indented-proposals.invoice_to'))->class('col-md-3 form-control-label')->for('invoice_to') }}

        <div class="col-sm-9">
            {{
                HTML()->text('invoice_to')
                ->class('form-control')
                ->placeholder(__('validation.attributes.backend.indented-proposals.invoice_to'))
                ->attribute('maxlength', 60)
                ->attribute('readOnly')
                ->value($model->invoice_to)
                ->required()
            }}
        </div>
    </div><!--form-group-->

    <div class="form-group row">
        <label for="" class="col-md-3 form-control-label"></label>

        <div class="col-sm-9">
            <textarea name="invoice_to_address" id="invoice_to_address" class="form-control" placeholder="Invoice to Address" readOnly>{{ $model->invoice_to_address }}</textarea>
        </div>
    </div><!--form-group-->

    <div class="form-group row">
        {{ html()->label(__('validation.attributes.backend.indented-proposals.ship_to'))->class('col-md-3 form-control-label')->for('ship_to') }}

        <div class="col-sm-9">
            {{
                html()->text('ship_to')
                ->class('form-control')
                ->placeholder(__('validation.attributes.backend.indented-proposals.ship_to'))
                ->attribute('maxlength', 60)
                ->attribute('readOnly')
                ->value($model->ship_to)
                ->required()
            }}
        </div>
    </div><!--form-group-->

    <hr>

    @if (auth()->user()->roles_label == 'Secretary')
    <div class="form-group row">
        <label class="col-md-3 form-control-label"></label>

        <div class="col-sm-9">
            <textarea name="ship_to_address" id="ship_to_address" class="form-control" placeholder="Ship to Address" readonly>{{ $model->ship_to_address }}</textarea>
        </div>
    </div><!--form-group-->
    @else
    <div class="form-group row">
        <label class="col-md-3 form-control-label"></label>

        <div class="col-sm-9">
            <textarea name="ship_to_address" id="ship_to_address" class="form-control" placeholder="Ship to Address" readOnly>{{ $model->ship_to_address }}</textarea>
        </div>
    </div><!--form-group-->
    @endif

    @if (auth()->user()->roles_label == 'Secretary')
    <div class="form-group row">
        <label class="col-md-3 form-control-label">Special Instruction</label>

        <div class="col-sm-9">
            <textarea name="special_instruction" id="special_instruction" class="form-control" placeholder="Special Instruction">{{ $model->special_instruction }}</textarea>
        </div>
    </div><!--form-group-->
    @else
    <div class="form-group row">
        <label class="col-md-3 form-control-label">Special Instruction</label>

        <div class="col-sm-9">
            <textarea name="special_instruction" id="special_instruction" class="form-control" placeholder="Special Instruction" readonly>{{ $model->special_instruction }}</textarea>
        </div>
    </div><!--form-group-->
    @endif

    @if (auth()->user()->roles_label == 'Secretary')
    <div class="form-group row">
        {{ html()->label(__('validation.attributes.backend.indented-proposals.ship_via'))->class('col-md-3 form-control-label')->for('ship_via') }}

        <div class="col-sm-9">
            <input type="text" id="ship_via" name="ship_via" placeholder="Ship via" class="form-control" value="{{ $model->ship_via }}">
        </div>
    </div><!--form-group-->
    @else
    <div class="form-group row">
        {{ html()->label(__('validation.attributes.backend.indented-proposals.ship_via'))->class('col-md-3 form-control-label')->for('ship_via') }}

        <div class="col-sm-9">
            <input type="text" id="ship_via" name="ship_via" class="form-control" value="{{ $model->ship_via }}" readOnly>
        </div>
    </div><!--form-group-->
    @endif

    @if (auth()->user()->roles_label == 'Secretary')
    <div class="form-group row">
        <label class="col-md-3 form-control-label">Amount</label>

        <div class="col-sm-9">
            <input name="amount" id="amount" class="form-control" placeholder="Amount" value="{{ $model->amount }}">
        </div>
    </div><!--form-group-->
    @else
    <div class="form-group row">
        <label class="col-md-3 form-control-label"></label>

        <div class="col-sm-9">
            <input name="amount" id="amount" class="form-control" placeholder="Ship to Address" readOnly value="{{ $model->amount }}">
        </div>
    </div><!--form-group-->
    @endif

    @if (auth()->user()->roles_label == 'Secretary')
    <div class="form-group row">
        <label class="col-md-3 form-control-label">Packing</label>

        <div class="col-sm-9">
            <textarea name="packing" id="packing" class="form-control" placeholder="Packing">{{ $model->packing }}</textarea>
        </div>
    </div><!--form-group-->
    @else
    <div class="form-group row">
        <label class="col-md-3 form-control-label">Packing</label>

        <div class="col-sm-9">
            <textarea name="packing" id="packing" class="form-control" placeholder="Packing" readonly>{{ $model->packing }}</textarea>
        </div>
    </div><!--form-group-->
    @endif

    @if (auth()->user()->roles_label == 'Secretary')
    <div class="form-group row">
        <label class="col-md-3 form-control-label">Documents</label>

        <div class="col-sm-9">
            <textarea name="documents" id="documents" class="form-control" placeholder="Documents">{{ $model->documents }}</textarea>
        </div>
    </div><!--form-group-->
    @else
    <div class="form-group row">
        <label class="col-md-3 form-control-label">Documents</label>

        <div class="col-sm-9">
            <textarea name="documents" id="documents" class="form-control" placeholder="Documents" readonly>{{ $model->documents }}</textarea>
        </div>
    </div><!--form-group-->
    @endif

    @if (auth()->user()->roles_label == 'Secretary')
    <div class="form-group row">
        {{ html()->label(__('validation.attributes.backend.indented-proposals.insurance'))->class('col-md-3 form-control-label')->for('insurance') }}

        <div class="col-sm-9">
            <input type="text" id="insurance" name="insurance" class="form-control" value="{{ $model->insurance }}" placeholder="{{ __('validation.attributes.backend.indented-proposals.insurance') }}">
        </div>
    </div><!--form-group-->
    @else
    <div class="form-group row">
        {{ html()->label(__('validation.attributes.backend.indented-proposals.insurance'))->class('col-md-3 form-control-label')->for('insurance') }}

        <div class="col-sm-9">
            <input type="text" id="insurance" name="insurance" class="form-control" value="{{ $model->insurance }}" readOnly>
        </div>
    </div><!--form-group-->
    @endif

    <h5 class="card-title">Bank Information</h5>
    <hr>

    @if (auth()->user()->roles_label == 'Secretary')
    <div class="form-group row">
        {{ html()->label(__('validation.attributes.backend.indented-proposals.bank_detail_name'))->class('col-md-3 form-control-label')->for('bank_detail_name') }}

        <div class="col-sm-9">
            <input type="text" id="bank_detail_name" name="bank_detail_name" class="form-control" value="{{ $model->bank_detail_name }}" placeholder="{{__('validation.attributes.backend.indented-proposals.bank_detail_name')}}">
        </div>
    </div><!--form-group-->
    @else
    <div class="form-group row">
        {{ html()->label(__('validation.attributes.backend.indented-proposals.bank_detail_name'))->class('col-md-3 form-control-label')->for('bank_detail_name') }}

        <div class="col-sm-9">
            <input type="text" id="bank_detail_name" name="bank_detail_name" class="form-control" value="{{ $model->bank_detail_name }}" readOnly>
        </div>
    </div><!--form-group-->
    @endif

    @if (auth()->user()->roles_label == 'Secretary')
    <div class="form-group row">
        {{ html()->label(__('validation.attributes.backend.indented-proposals.bank_detail_address'))->class('col-md-3 form-control-label')->for('bank_detail_address') }}

        <div class="col-sm-9">
            <textarea type="text" id="bank_detail_address" name="bank_detail_address" class="form-control" placeholder="{{__('validation.attributes.backend.indented-proposals.bank_detail_address')}}">{{ $model->bank_detail_address }}</textarea>
        </div>
    </div><!--form-group-->
    @else
    <div class="form-group row">
        {{ html()->label(__('validation.attributes.backend.indented-proposals.bank_detail_address'))->class('col-md-3 form-control-label')->for('bank_detail_address') }}

        <div class="col-sm-9">
            <textarea type="text" id="bank_detail_address" name="bank_detail_address" class="form-control" readOnly>{{ $model->bank_detail_address }}</textarea>
        </div>
    </div><!--form-group-->
    @endif

    @if (auth()->user()->roles_label == 'Secretary')
    <div class="form-group row">
        {{ html()->label(__('validation.attributes.backend.indented-proposals.bank_detail_account_no'))->class('col-md-3 form-control-label')->for('bank_detail_account_no') }}

        <div class="col-sm-9">
            <input type="text" id="bank_detail_account_no" name="bank_detail_account_no" class="form-control" value="{{ $model->bank_detail_account_no }}" placeholder="{{__('validation.attributes.backend.indented-proposals.bank_detail_account_no')}}">
        </div>
    </div><!--form-group-->
    @else
    <div class="form-group row">
        {{ html()->label(__('validation.attributes.backend.indented-proposals.bank_detail_account_no'))->class('col-md-3 form-control-label')->for('bank_detail_account_no') }}

        <div class="col-sm-9">
            <input type="text" id="bank_detail_account_no" name="bank_detail_account_no" class="form-control" value="{{ $model->bank_detail_account_no }}" readOnly>
        </div>
    </div><!--form-group-->
    @endif

    @if (auth()->user()->roles_label == 'Secretary')
    <div class="form-group row">
        {{ html()->label(__('validation.attributes.backend.indented-proposals.bank_detail_swift_code'))->class('col-md-3 form-control-label')->for('bank_detail_swift_code') }}

        <div class="col-sm-9">
            <input type="text" id="bank_detail_swift_code" name="bank_detail_swift_code" class="form-control" value="{{ $model->bank_detail_swift_code }}" placeholder="{{__('validation.attributes.backend.indented-proposals.bank_detail_swift_code')}}">
        </div>
    </div><!--form-group-->
    @else
    <div class="form-group row">
        {{ html()->label(__('validation.attributes.backend.indented-proposals.bank_detail_swift_code'))->class('col-md-3 form-control-label')->for('bank_detail_swift_code') }}

        <div class="col-sm-9">
            <input type="text" id="bank_detail_swift_code" name="bank_detail_swift_code" class="form-control" value="{{ $model->bank_detail_swift_code }}" readOnly>
        </div>
    </div><!--form-group-->
    @endif

    @if (auth()->user()->roles_label == 'Secretary')
    <div class="form-group row">
        {{ html()->label(__('validation.attributes.backend.indented-proposals.bank_detail_name'))->class('col-md-3 form-control-label')->for('bank_detail_name') }}

        <div class="col-sm-9">
            <input type="text" id="bank_detail_name" name="bank_detail_name" class="form-control" value="{{ $model->bank_detail_name }}" placeholder="{{__('validation.attributes.backend.indented-proposals.bank_detail_name')}}">
        </div>
    </div><!--form-group-->
    @else
    <div class="form-group row">
        {{ html()->label(__('validation.attributes.backend.indented-proposals.bank_detail_account_name'))->class('col-md-3 form-control-label')->for('bank_detail_account_name') }}

        <div class="col-sm-9">
            <input type="text" id="bank_detail_account_name" name="bank_detail_account_name" class="form-control" value="{{ $model->bank_detail_name }}" readOnly>
        </div>
    </div><!--form-group-->
    @endif

    <h5 class="card-title">Commission Information</h5>
    <hr>
    
    @if (auth()->user()->roles_label == 'Secretary')
    <div class="form-group row">
        {{ html()->label(__('validation.attributes.backend.indented-proposals.commission_note'))->class('col-md-3 form-control-label')->for('commission_note') }}

        <div class="col-sm-9">
            <textarea type="text" id="commission_note" name="commission_note" class="form-control" placeholder="{{__('validation.attributes.backend.indented-proposals.commission_note')}}">{{ $model->commission_note }}</textarea>
        </div>
    </div><!--form-group-->
    @else
    <div class="form-group row">
        {{ html()->label(__('validation.attributes.backend.indented-proposals.commission_note'))->class('col-md-3 form-control-label')->for('commission_note') }}

        <div class="col-sm-9">
            <textarea type="text" id="commission_note" name="commission_note" class="form-control" readOnly>{{ $model->commission_note }}</textarea>
        </div>
    </div><!--form-group-->
    @endif

    @if (auth()->user()->roles_label == 'Secretary')
    <div class="form-group row">
        {{ html()->label(__('validation.attributes.backend.indented-proposals.commission_address'))->class('col-md-3 form-control-label')->for('commission_address') }}

        <div class="col-sm-9">
            <input type="text" id="commission_address" name="commission_address" class="form-control" value="{{ $model->commission_address }}" placeholder="{{__('validation.attributes.backend.indented-proposals.commission_address')}}">
        </div>
    </div><!--form-group-->
    @else
    <div class="form-group row">
        {{ html()->label(__('validation.attributes.backend.indented-proposals.commission_address'))->class('col-md-3 form-control-label')->for('commission_address') }}

        <div class="col-sm-9">
            <input type="text" id="commission_address" name="commission_address" class="form-control" value="{{ $model->commission_address }}" readOnly>
        </div>
    </div><!--form-group-->
    @endif

    @if (auth()->user()->roles_label == 'Secretary')
    <div class="form-group row">
        {{ html()->label(__('validation.attributes.backend.indented-proposals.commission_account_number'))->class('col-md-3 form-control-label')->for('commission_account_number') }}

        <div class="col-sm-9">
            <input type="text" id="commission_account_number" name="commission_account_number" class="form-control" value="{{ $model->commission_account_number }}" placeholder="{{__('validation.attributes.backend.indented-proposals.commission_account_number')}}">
        </div>
    </div><!--form-group-->
    @else
    <div class="form-group row">
        {{ html()->label(__('validation.attributes.backend.indented-proposals.commission_account_number'))->class('col-md-3 form-control-label')->for('commission_account_number') }}

        <div class="col-sm-9">
            <input type="text" id="commission_account_number" name="commission_account_number" class="form-control" value="{{ $model->commission_account_number }}" readOnly>
        </div>
    </div><!--form-group-->
    @endif

    @if (auth()->user()->roles_label == 'Secretary')
    <div class="form-group row">
        {{ html()->label(__('validation.attributes.backend.indented-proposals.commission_swift_code'))->class('col-md-3 form-control-label')->for('commission_swift_code') }}

        <div class="col-sm-9">
            <input type="text" id="commission_swift_code" name="commission_swift_code" class="form-control" value="{{ $model->commission_swift_code }}" placeholder="{{__('validation.attributes.backend.indented-proposals.commission_swift_code')}}">
        </div>
    </div><!--form-group-->
    @else
    <div class="form-group row">
        {{ html()->label(__('validation.attributes.backend.indented-proposals.commission_swift_code'))->class('col-md-3 form-control-label')->for('commission_swift_code') }}

        <div class="col-sm-9">
            <input type="text" id="commission_swift_code" name="commission_swift_code" class="form-control" value="{{ $model->commission_swift_code }}" readOnly>
        </div>
    </div><!--form-group-->
    @endif
</div>