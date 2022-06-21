<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrdercompra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_ordercompra', function (Blueprint $table) {
            $table->id();
            $table->integer('nro_comprobante')->nullable();
            $table->string('serie_comprobante')->nullable();
            $table->bigInteger('monto_total')->nullable();
            $table->text('observacion')->nullable();

            // Relaciona a una orden de trabajo
            $table->bigInteger('ord_trabajo_id')->nullable();

            $table->integer('sucursal_id')->nullable();
            $table->bigInteger('cliente_id');

            // Relacionado a la tabla de usuarios
            $table->bigInteger('vendedor_id')->nullable();

            $table->integer('tipo_presupuesto')->nullable();
            $table->integer('comprobantetipo_id')->nullable();

            $table->dateTime('fecha')->nullable();

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
        Schema::dropIfExists('emp_ordercompra');
    }
}
