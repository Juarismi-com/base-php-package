<?php
namespace Juarismi\Base\Traits;

use Juarismi\Base\Models\Negocio\ComprobantePorSucursal;
use Juarismi\Base\Models\Common\ComprobanteTipo;

trait TComprobanteTipo {

  /**
   * Retorna el tipo de comprobante (con estado activo) por sucursal
   * @param $comprobanteTipoId 
   * @param $sucursalId
   */
  public function getLastComprobanteEmitido(
    $comprobanteTipoId, 
    $sucursalId = 1
  ){
    
    $comprobanteTipo = ComprobanteTipo::findOrFail($comprobanteTipoId);
    
    $comprobante = ComprobantePorSucursal::firstOrCreate(
      [
        'comprobantetipo_id' => $comprobanteTipoId,
        'sucursal_id' => $sucursalId,
        'estado' => 1
      ]
    );
    
    if ($comprobante == NULL)
      throw new \Exception("Comprobante no existe en sucursal", 1);
        
    $comprobante->ultimo_nro += 1;
    $comprobante->save();

    return $comprobante;
  }
}
