<?php

namespace Juarismi\Base\Http\Requests\Empleado;

use Illuminate\Foundation\Http\FormRequest;
//use App\Rules\Entidad\Ruc;
use Illuminate\Http\Request;
use Juarismi\Base\Models\Negocio\Empleado;

class EmpleadoBasicRequest extends FormRequest
{

    public function __construct(){
        $this->table_name = app(Empleado::class)->getTable();
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
                'nombre_apellido' => 'required',
                'telefono' => 'required',
                'ci' => 'required|unique:' . $this->table_name . '|min:6|max:9',
                'email' => 'required|unique:' . $this->table_name,
                'genero' => 'in:M,F,NE'
            ];
        } 

        return [
            'nombre_apellido' => 'required',
            'telefono' => 'required',
            'genero' => 'in:M,F,NE'
        ];
    }


    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return  [
            'nombre_apellido.required' => 'Nombre es requerido',
            'ci.required' => 'RUC o CI es requerido',
            'ci.unique' => 'CI ya existe',
            'ci.integer' => 'CI debe ser un número',
            'genero.in' => 'Genero Incorrecto',
            'email.required' => 'Email es requerido',
            'email.unique' => 'Email debe ser unico'
        ];

    }
}
