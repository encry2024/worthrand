<?php

namespace App\Http\Requests\Backend\Seal;

use Illuminate\Foundation\Http\FormRequest;

class ForceDeleteSealRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return fal$this->user()->can('force delete seal')se;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
