<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre'=>  ['required', 'max:250', Rule::unique('products')->ignore($this->id, 'id')],
            'category_id'=>'required',
            'precio'=>'required',
            'stock'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'El :attribute es obligatorio.',
            'unique' => 'ya existe ingrese otro',
            'max' => "El :attribute require como máximo 250 caracteres"
        ];
    }

    public function attributes()
    {
        return [
            'nombre' => 'campo nombre',
            'precio' => 'campo precio',
            'stock' => 'campo stock',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }
}
