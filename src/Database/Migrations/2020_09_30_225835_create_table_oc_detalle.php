<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOcDetalle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_ord_compra_detalle', function (Blueprint $table) {
            $table->id();

            $table->integer('order_compra_id')->nullable();
            $table->integer('presupuesto_id')->nullable();
            $table->integer('presupuesto_detalle_id')->nullable();
            
            $table->integer('proveedor_id')->nullable();
            $table->string('proveedor_nombre')->nullable();

            $table->integer('producto_id');
            $table->integer('precio_compra');
            $table->integer('precio_x_cantidad')->nullable();
            $table->integer('cantidad')->default(1);
            $table->text('observacion')->nullable();
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
        Schema::dropIfExists('emp_ord_compra_detalle');
    }
}
