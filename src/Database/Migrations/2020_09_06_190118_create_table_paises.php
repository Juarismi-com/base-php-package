<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePaises extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cm_paises', function (Blueprint $table) {
            $table->id();

            // 
            $table->string('moneda')->nullable();

            // PY = Paraguay AR = Argentina, BR = Brasil
            $table->string('codigo')->nullable();

            // +595 => Paraguay,  + 1 => USA, etc
            $table->string('prefijo_telefono')->nullable();
            $table->string('pais');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cm_paises');
    }
}
