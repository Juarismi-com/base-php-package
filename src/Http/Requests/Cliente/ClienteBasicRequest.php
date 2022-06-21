<?php

namespace Juarismi\Base\Http\Requests\Cliente;

use Illuminate\Foundation\Http\FormRequest;
//use App\Rules\Entidad\Ruc;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Juarismi\Base\Models\Negocio\Cliente;

class ClienteBasicRequest extends FormRequest
{

    public function __construct(){
        $this->table_name = app(Cliente::class)->getTable();
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
                'nombre' => 'required',
                'ci' => [ 
                    Rule::requiredIf($request->input('ruc') == NULL),
                    'nullable',
                    'integer', 
                    'unique:' . $this->table_name
                ],
                'ruc' => [ 
                    Rule::requiredIf($request->input('ci') == NULL),
                    'nullable',
                    'string', 
                    'unique:'  . $this->table_name
                ],
                'genero' => 'nullable|string|in:NE,M,F',
                'tipo_cliente' => 'nullable|string|in:P,E'
            ];
        } else {
            return [
                'nombre' => 'required',
                'ci' => 'nullable|integer',
                'ruc' => 'nullable|string',
                'genero' => 'nullable|string|in:NE,M,F',
                'tipo_cliente' => 'nullable|string|in:P,E'
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
        return  [
            'nombre.required' => 'Nombre es requerido',
            'ci.required' => 'RUC o CI es requerido',
            'ruc.required' => 'RUC o CI es requerido' . app(Cliente::class)->getTable(),
            'ci.unique' => 'CI ya existe',
            'ci.integer' => 'CI debe ser un número',
            'ruc.unique' => 'RUC ya existe',
            'genero.in' => 'Genero Incorrecto',
            'tipo_cliente.in' => 'Tipo de Cliente Incorrecto'
        ];

    }
}
