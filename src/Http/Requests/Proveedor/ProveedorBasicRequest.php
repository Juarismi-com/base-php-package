<?php

namespace Juarismi\Base\Http\Requests\Proveedor;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Juarismi\Base\Models\Negocio\Proveedor;

class ProveedorBasicRequest extends FormRequest
{

    public function __construct(){
        $this->table_name = app(Proveedor::class)->getTable();
    }

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
    public function rules(Request $request)
    {   
        if ($request->isMethod('post')){
            return [
              'nombre' => 'required|string',
              'nro_documento' => 'required|unique:' . $this->table_name,
            ];
        } else {
            return [
                'nombre' => 'required|string',
            ];
        }
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nombre.required' => 'Nombre es requerido',
            'telefono.required' => 'Telefono/Celular es requerido',
            'nro_documento.required' => 'Nro de Documento es requerido',
            'nro_documento.unique' => 'Proveedor ya Existe',
            'tipo_proveedor.required' => 'Tipo de Proveedor es requerido',
            'tipo_proveedor.in' => 'Tipo proveedor es incorrecto'
        ];
    }
}
