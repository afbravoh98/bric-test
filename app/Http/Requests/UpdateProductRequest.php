<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => 'required|string',
            'status' => 'required|boolean'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo name es requerido',
            'name.string' => 'El campo name debe ser una cadena de texto valida',
            'status.required'  => 'El campo status es requerido',
            'status.boolean'  => 'El campo status debe ser un booleano valido',
        ];
    }
}
