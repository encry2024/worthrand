<?php

namespace App\Http\Requests\Backend\Aftermarket;

use Illuminate\Foundation\Http\FormRequest;

class StoreAftermarketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('store aftermarket');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'              => 'required',
            'model'             => 'required',
            'part_number'       => 'required',
            'reference_number'  => 'required',
            'material_number'   => 'required',
            'serial_number'     => 'required',
            'tag_number'        => 'required',
            'ccn_number'        => 'required',
            'price'             => 'required',
            'company_name'      => 'required',
            'description'       => 'required',
            'stock_number'      => 'required',
            'sap_number'        => 'required',
        ];
    }
}
