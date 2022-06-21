<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableVentas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_ventas', function (Blueprint $table) {
            $table->id();

            $table->integer('nro_factura')->nullable();
            $table->string('serie_factura' , 10);

            $table->dateTime('fecha_venta');
            $table->enum('condicion_venta', ['credito', 'contado']);
            $table->bigInteger('monto_total')->default(0);
            $table->bigInteger('impuesto_total')->nullable();


            // Relaciona con el id del usuario
            $table->integer('vendedor_id')->nullable();
            $table->integer('cliente_id')->nullable();
            $table->integer('sucursal_id')->nullable();
            $table->integer('razonsocial_id')->nullable();
            $table->integer('comprobantetipo_id')->nullable();
            
            $table->string('observacion')->nullable();
            
            $table->integer('estado')->default(1);

            // Forma de pago al proveedor
            // Banco X, Caja, etc, etc -> relacionado a la table compra pago
            $table->integer('formapago_id');

            
            // Empleado asignado
            $table->integer('atendedor_id')->nullable();

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
        Schema::dropIfExists('emp_ventas');
    }
}
