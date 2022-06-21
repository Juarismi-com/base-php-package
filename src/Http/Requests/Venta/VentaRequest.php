<?php

namespace Juarismi\Base\Http\Requests\Venta;

use Illuminate\Foundation\Http\FormRequest;
use Juarismi\Base\Rules\Producto as ProductoRule;
use Juarismi\Base\Rules\Cliente as ClienteRule;

class VentaRequest extends FormRequest
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
            'venta_detalle' => 'required|array',
            'venta_detalle.*.producto_id' => [
                'required' , 
                new ProductoRule
            ],
            'venta_detalle.*.precio' => 'required|integer',
            'serie_factura' => 'required',
            'fecha_venta' => 'required',
            'condicion_venta' => 'required|in:credito,contado',
            'sucursal_id' => 'required',
            'formapago_id' => 'required',

            // En caso que se emita factura a nombre de otra persona
            'ruc' => 'nullable|string',
            'razon_social'=> 'nullable|string'
        ];
    }

    protected function prepareForValidation(){
        $this->merge([
            'fecha_venta' => date_to_DateString($this->fecha_venta),
        ]);
    }

    public function messages(){
        return [
            'cliente.required' => ':attribute es requirido',
            'venta_detalle.required' => ':attribute es requirido',
            'fecha_venta.required' => ':attribute es requirido',
            'condicion_venta.required' => ':attribute es requirido',
            'sucursal_id.required' => ':attribute es requirido',
            'formapago_id.required' => ':attribute es requirido',
            'serie_factura.required' => ':attribute es requirido',

            'condicion_venta.in' => ':attribute es invalido',

            'venta_detalle.*.required' => 'Detalle es requerido',
        ];
    }
}
