<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCajas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_cajas', function (Blueprint $table) {
            $table->id();

            // Nombre de la caja
            $table->string('nombre_caja');
            $table->string('uuid')->nullable();
            $table->integer('sucursal_id')->nullable();
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
        Schema::dropIfExists('emp_cajas');
    }
}
