<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCompras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_compras', function (Blueprint $table) {
            $table->id();
            $table->integer('nro_comprobante')->nullable();

            $table->dateTime('fecha_compra');
            $table->enum('condicion_compra', ['credito', 'contado'])
                ->default('contado');
            $table->bigInteger('monto_total')->default(0);
            $table->bigInteger('impuesto_total')->nullable();
            
            $table->integer('proveedor_id')->nullable();

            // Relacionado al id del usuario
            $table->integer('comprador_id')->nullable();
            $table->integer('sucursal_id')->nullable();
            $table->integer('razonsocial_id')->nullable();
            $table->integer('comprobantetipo_id')->default(3);
            
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
        Schema::dropIfExists('emp_compras');
    }
}
