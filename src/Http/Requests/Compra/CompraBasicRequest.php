<?php

namespace Juarismi\Base\Http\Requests\Cliente;

use Illuminate\Foundation\Http\FormRequest;

class CompraBasicRequest extends FormRequest
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
            'nombre' => 'required',
            'ci' => 'nullable|integer',
            'ruc' => 'nullable|string',
            'genero' => 'nullable|string|in:M,F',
            'tipo_cliente' => 'nullable|string|in:P,E'
        ];    
    }
}
