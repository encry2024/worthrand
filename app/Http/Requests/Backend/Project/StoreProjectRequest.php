<?php

namespace App\Http\Requests\Backend\Project;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('store project');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'customer'              => 'required',
            'name'                  => 'required',
            'source'                => 'required',
            'address_1'             => 'required',
            'contact_person_1'      => 'required',
            'contact_number_1'      => 'required',
            'email_1'               => 'required',

            'consultant'            => 'required',
            'address_2'             => 'required',
            'contact_person_2'      => 'required',
            'contact_number_2'      => 'required',
            'email_2'               => 'required',

            'shorted_list_epc'      => 'required',
            'address_3'             => 'required',
            'contact_person_3'      => 'required',
            'contact_number_3'      => 'required',
            'email_3'               => 'required',

            'approved_vendors_list' => 'required',
            'requirements_coor'     => 'required',
            'epc_award'             => 'required',
            'award_date'            => 'required',
            'implementation_date'   => 'required',
            'execution_date'        => 'required',

            'bu'                    => 'required',
            'bu_reference'          => 'required',
            'wpc_reference'         => 'required',
            'affinity_reference'    => 'required',
            'value'                 => 'required',

            'reference_number'      => 'required',
            'types_of_sales'        => 'required',
            'tag_number'            => 'required',
            'application'           => 'required',
            'pump_model'            => 'required',
            'serial_number'         => 'required',
            'competitors'           => 'required',
            'status'                => 'required',
            'final_result'          => 'required'
        ];
    }
}
