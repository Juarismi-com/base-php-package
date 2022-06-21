<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePresupuestodetalle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_presupuesto_detalle', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad')->nullable();
            $table->bigInteger('precio_vta');

            $table->bigInteger('presupuesto_id');
            $table->bigInteger('producto_id')->nullable();
            
            $table->bigInteger('precio_x_cantidad')->nullable();
            $table->float('comision_porcentaje')->default(0);
            $table->float('desc_porcentaje')->default(0);

            $table->integer('estado')->default(1);
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
        Schema::dropIfExists('emp_presupuesto_detalle');
    }
}
