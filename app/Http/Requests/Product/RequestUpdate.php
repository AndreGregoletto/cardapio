<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class RequestUpdate extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'price' => floatval(str_replace(',','.', str_replace(['R$','.'],'', $this->price )))
        ]);
        
    }

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
            'photo'       => 'sometimes|image|mimes:png,jpg',
            'code'        => 'sometimes|unique:products,code, '.$this->product->id,
            'name'        => 'sometimes',
            'category_id' => 'sometimes',
            'price'       => 'sometimes|numeric',
            'description' => 'sometimes|min:4'
        ];
    }

    public function attributes()
    {
        return [
            'category_id' => 'categoria',
            'price'       => 'preço',
            'code'        => 'codigo'
        ];
    }
}
