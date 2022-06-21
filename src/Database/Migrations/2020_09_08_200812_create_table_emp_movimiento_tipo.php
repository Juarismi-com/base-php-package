<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEmpMovimientoTipo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_movimiento_tipo', function (Blueprint $table) {
            $table->id();

            $table->string('descripcion');

            // ENTRADA = 1 ó  SALIDA = 2, GASTO = 3
            $table->enum('tipo_cuenta', [ 1 , 2 , 3 ]);
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
        Schema::dropIfExists('emp_movimiento_tipo');
    }
}
