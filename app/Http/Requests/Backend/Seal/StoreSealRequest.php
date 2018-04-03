<?php

namespace App\Http\Requests\Backend\Seal;

use Illuminate\Foundation\Http\FormRequest;

class StoreSealRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('store seal');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'              =>  'required',
            'drawing_number'    =>  'required',
            'bom_number'        =>  'required',
            'end_user'          =>  'required',
            'seal_type'         =>  'required',
            'size'              =>  'required',
            'material_number'   =>  'required',
            'code'              =>  'required',
            'model'             =>  'required',
            'serial_number'     =>  'required',
            'tag'               =>  'required',
            'price'             =>  'required'
        ];
    }
}
