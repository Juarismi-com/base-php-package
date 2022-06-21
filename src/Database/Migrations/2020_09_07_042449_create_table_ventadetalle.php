<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableVentadetalle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_venta_detalle', function (Blueprint $table) {
            $table->id();

            $table->integer('producto_id');
            $table->integer('venta_id');

            $table->integer('precio');
            $table->integer('precio_defecto')->nullable();
            $table->integer('nro_factura')->nullable();

            // Relacionado al tipo de comprobante
            $table->string('serie_factura')->nullable();
            $table->string('concepto')->nullable();

            // iva por defecto 5 o 10
            $table->float('impuesto')->nullable()
                ->default(0.10);
                
            $table->integer('cantidad')->nullable();
            $table->dateTime('fecha')->nullable();
            $table->integer('estado')->default(1);
            $table->text('observacion')->nullable();
            $table->bigInteger('precio_x_cantidad')->nullable();
            $table->float('porcentaje_comision')->default(0);

            // Empleado asignado
            $table->integer('atendedor_id')->nullable();

            // Determina el monto
            $table->integer('comision_id')->nullable();
            $table->integer('comision_porcentaje')->default(0);
            $table->integer('comision_amount')->default(0);

            // Descuento
            $table->float('desc_porcentaje')->default(0);
            $table->float('desc_amount')->default(0);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emp_venta_detalle');
    }
}
