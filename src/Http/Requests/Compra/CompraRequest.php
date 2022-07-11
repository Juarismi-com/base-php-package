<?php

namespace Juarismi\Base\Http\Requests\Compra;

use Illuminate\Foundation\Http\FormRequest;
use Juarismi\Base\Rules\Producto as ProductoRule;
use Juarismi\Base\Rules\Proveedor as ProveedorRule;
use Juarismi\Base\Rules\Sucursal as SucursalRule;
use Juarismi\Base\Rules\FormaPago as FormaPagoRule;
use Juarismi\Base\Rules\ComprobanteTipo as ComprobanteTipoRule;

class CompraRequest extends FormRequest
{
    /**
     * Si alguno de los ID's de producto que se envia no se encuentra en la 
     * DB, no permite la inserción
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
          'proveedor_id' => [ 
              'required', 'integer', new ProveedorRule
          ], 
          'compra_detalle' => 'required|array',
          'compra_detalle.*.producto_id' => [
              'required' , 
              //'unique:App\Model\Negocio\CompraDetalle,compra_id,producto_id',
                new ProductoRule
          ],
          'compra_detalle.*.precio' => 'required|integer',
          'fecha_compra' => 'required',
          'condicion_compra' => 'required|in:credito,contado',
          'sucursal_id' => ['required', new SucursalRule ],
          'formapago_id' => ['required', new FormaPagoRule ],
          'comprobantetipo_id' => ['required', new ComprobanteTipoRule],
        ];
    }

    protected function prepareForValidation(){
        $this->merge([
            'fecha_compra' => date_to_DateString($this->fecha_compra),
        ]);
    }

    public function messages(){
        return [
            'proveedor_id.required' => ':attribute es requirido',
            'compra_detalle.required' => ':attribute es requirido',
            'fecha_compra.required' => ':attribute es requirido',
            'condicion_compra.required' => ':attribute es requirido',
            'sucursal_id.required' => ':attribute es requirido',
            'formapago_id.required' => ':attribute es requirido',
            'serie_factura.required' => ':attribute es requirido',

            'condicion_compra.in' => ':attribute es invalido',

            'compra_detalle.*.required' => 'Detalle es requerido'
        ];
    }
}