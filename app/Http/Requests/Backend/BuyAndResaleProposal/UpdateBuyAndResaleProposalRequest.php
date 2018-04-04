<?php

namespace App\Http\Requests\Backend\BuyAndResaleProposal;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBuyAndResaleProposalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('update buy and resale proposal');;
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
