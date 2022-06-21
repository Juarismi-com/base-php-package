<?php

namespace Juarismi\Base\Http\Requests\Cliente;

use Illuminate\Foundation\Http\FormRequest;
use Juarismi\Base\Rules\Producto as ProductoRule;
use Juarismi\Base\Rules\Cliente as ClienteRule;

class PresupuestoRequest extends FormRequest
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
            'cliente_id' => [ 
                'required', 'integer', new ClienteRule
            ], 
            'presupuesto_detalle' => 'required|array',
            'presupuesto_detalle.*.producto_id' => [
                'nullable' , 
                new ProductoRule
            ],
            'presupuesto_detalle.*.precio_vta' => 'required|integer',
            'fecha' => 'required',
            'tipo_presupuesto' => 'nullable|integer',
            'sucursal_id' => 'required'
        ];
    }

    protected function prepareForValidation(){
        $this->merge([
            'fecha' => date_to_DateString($this->fecha),
        ]);
    }

    public function messages(){
        return [
            'cliente.required' => ':attribute es requirido',
            'presupuesto_detalle.required' => ':attribute es requirido',
            'fecha.required' => ':attribute es requirido',
            'condicion_venta.required' => ':attribute es requirido',
            'sucursal_id.required' => ':attribute es requirido',

            'presupuesto_detalle.*.producto_id' => 'Producto en detalle es requerido',

            'tipo_presupuesto.integer' => ':attribute es invalido'
        ];
    }
}
