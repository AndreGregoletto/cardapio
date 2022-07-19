<?php

namespace App\Http\Requests\Menu;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{

    public function prepareForValidation()
    {
        $this->merge([
            'delivery' => $this->delivery == 'true' ? true : false
        ]);
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !auth()->check() || auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'method_payment_id' => 'sometimes',
            'name'         => 'required',
            'phone'        => 'sometimes',
            'cell'         => 'required',
            'delivery'     => 'sometimes|boolean',
            'zipcode'      => 'required',
            'address'      => 'required',
            'neighborhood' => 'required',
            'number'       => 'required',
            'complement'   => 'sometimes',
            'city'         => 'required',
            'state'        => 'required'
        ];
    }
}
