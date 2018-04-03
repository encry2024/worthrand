<?php

namespace App\Http\Requests\Backend\PricingHistory;

use Illuminate\Foundation\Http\FormRequest;

class StoreGeneralPricingHistory extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('store pricing history');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'po_number'     =>  'required',
            'pricing_date'  =>  'required|date:Y-m-d',
            'price'         =>  'required',
            'terms'         =>  'required',
            'delivery'      =>  'required',
            'fpd_reference' =>  'required',
            'wpc_reference' =>  'required'
        ];
    }
}
