<?php

namespace App\Http\Requests\Backend\Customer;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('store customer');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'                          =>  'required',
            'address'                       =>  'required',
            'city'                          =>  'required',
            'postal_code'                   =>  'required|numeric',
            'plant_site_address'            =>  'required',
            'contact_person'                =>  'required',
            'contact_number'                =>  'required',
            'position_of_contact_person'    =>  'required'
        ];
    }
}
