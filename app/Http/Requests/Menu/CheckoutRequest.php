<?php

namespace App\Http\Requests\Menu;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{

    public function prepareForValidation()
    {
        $this->merge([
            'delivery' => $this->delivery == 'true' ? true : false,
            'date'     => now()->format('y-m-d')
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
            'type_payment_id' => 'required',
            'name'            => 'required',
            'phone'           => 'sometimes',
            'cell'            => 'required',
            'date'            => 'required|date',
            'delivery'        => 'required|boolean',
            'zipcode'         => 'required_if:delivery,true',
            'address'         => 'required_if:delivery,true',
            'neighborhood'    => 'required_if:delivery,true',
            'number'          => 'required_if:delivery,true',
            'complement'      => 'sometimes',
            'city'            => 'required_if:delivery,true',
            'state'           => 'required_if:delivery,true'
        ];
    }
}
