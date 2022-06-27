<?php

namespace Juarismi\Base\Http\Requests\Producto;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
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
            'nombre' => 'required|min:3|max:50',
            'precio_vta' => 'nullable|integer',
            'precio_vta2' => 'nullable|integer',
            'precio_vta3' => 'nullable|integer',
            'precio_vta4' => 'nullable|integer',
            'precio_vta5' => 'nullable|integer',
            'precio_compra' => 'nullable|integer'
        ];
    }


    public function messages(){
        return [
            'nombre.required' => ':attribute es requirido',
            'precio_compra.integer' => ':attribute debe ser un numero',
            'precio_vta.integer' => ':attribute debe ser un numero',
            'precio_vta2.integer' => ':attribute debe ser un numero',
            'precio_vta3.integer' => ':attribute debe ser un numero',
            'precio_vta4.integer' => ':attribute debe ser un numero',
            'precio_vta5.integer' => ':attribute debe ser un numero',
            'estado' => ':attribute es invalido',
        ];
    }
}
