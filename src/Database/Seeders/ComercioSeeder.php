<?php

namespace Juarismi\Base\Database\Seeders;


use Illuminate\Database\Seeder;
use Juarismi\Base\Models\Negocio\Empresa;
use Juarismi\Base\Models\Negocio\Sucursal;
use Juarismi\Base\Models\Negocio\Cliente;
use Juarismi\Base\Models\Negocio\Proveedor;
use Juarismi\Base\Models\Negocio\Producto;
use Juarismi\Base\Models\Negocio\ProductoTipo;

/**
 * 
 * Datos inicializados del comercio
 * 
 */
class ComercioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // --- Genera Empresa por defecto ---
        Empresa::truncate();
        $empresa = Empresa::create([
        	'ruc' => '12345678-9',
        	'nombre' => 'Mi Empresa',
        	'stock_negativo' => 'si'
        ]);

        // --- Asigna una sucursal a la empresa --- 
        Sucursal::truncate();
        $sucursal = Sucursal::create([
        	'nombre_sucursal' => 'Mi primera sucursal',
        	'empresa_id' => $empresa->id
        ]);

        // Asigna cliente y proveedor por defecto
        Cliente::truncate();
        Cliente::create([ "nombre" => "Cliente X", "ruc" => "0000000-0"]);

        Proveedor::truncate();
        Proveedor::create([ 
        	"nombre" => "Proveedor X", 
        	"nro_documento" => "0000000-0",
        	"telefono" =>  "000000000",
       	]);

        // --- Se asigna una categoria no especificada --- 
        ProductoTipo::truncate();
        $producto_tipo = ProductoTipo::create([
            'nombre' => 'SIN CATEGORIA'
        ]);

        // Asigna 3 Productos por defecto
        $productos = [
            [ 
                'nombre' => 'Producto 1 de prueba', 
                'precio_compra' => 532000,
                'precio_vta' => 680000,
                'precio_vta2' => 750000,
                'precio_vta3' => 865200,
            ], 
            [
                'nombre' => 'Producto 2 de prueba', 
                'precio_compra' => 256000,
                'precio_vta' => 390000,
                'precio_vta2' => 450000,
                'precio_vta3' => 520000,    
            ], 
            [
                'nombre' => 'Producto 3 de prueba', 
                'precio_compra' => 150000,
                'precio_vta' => 168500,
                'precio_vta2' => 198350,
                'precio_vta3' => 217000,    
            ]
        ];

        Producto::truncate();
        foreach ($productos as $producto) {
        	Producto::create([
                'nombre' => $producto['nombre'], 
                'precio_compra' => $producto['precio_compra'],
                'precio_vta' => $producto['precio_vta'],
                'precio_vta2' => $producto['precio_vta2'],
                'precio_vta3' => $producto['precio_vta3'],
                'productotipo_id' => $producto_tipo->id
            ]);
        }

    }
}
