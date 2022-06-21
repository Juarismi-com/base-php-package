<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommonCiudades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cm_ciudades', function (Blueprint $table) {
            $table->id('idciudad');
            $table->integer('idprovincia')->nullable();
            $table->string('codigo');
            $table->string('nombre');
            $table->string('latitud')->nullable();
            $table->string('longitud')->nullable();
            $table->dateTime('fechareplicacion',0)->nullable();
            $table->string('firma')->nullable();
            $table->string('appuser')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cm_ciudades');
    }
}
