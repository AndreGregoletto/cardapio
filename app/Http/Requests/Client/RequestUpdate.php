<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class RequestUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check() && auth()->user()->hasRole('Admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'                 => 'required',
            'phone'                => 'sometimes',
            'cell'                 => 'required',
            'address.*'            => 'required',
            'address.address'      => 'required',
            'address.neighborhood' => 'required',
            'address.number'       => 'required',
            'address.complement'   => 'sometimes',
            'address.city'         => 'required',
            'address.state'       => 'required'

        ];
    }
}
