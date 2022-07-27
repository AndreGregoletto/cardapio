<?php

namespace App\Http\Requests\Configuration;

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
            'name'         => 'sometimes',
            'logo'         => 'nullable|sometimes|image',
            'type'         => 'sometimes',
            'phone'        => 'sometimes',
            'cell'         => 'sometimes',
            'open'         => 'sometimes',
            'close'        => 'sometimes',
            'delivery'     => 'sometimes',
            'delivery_fee' => 'sometimes'
        ];
    }
}
