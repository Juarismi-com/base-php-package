<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEmpAperturaCierreCaja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        // Apertura y cierre de caja
        Schema::create('emp_ape_cie_caja', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_apertura');
            $table->dateTime('fecha_cierre')->nullable();

            // Relacionado a user_id
            $table->integer('cajero_id')->nullable();
            $table->integer('caja_id');
            $table->integer('sucursal_id')->nullable();

            $table->bigInteger('monto_apertura')->nullable();
            $table->bigInteger('monto_cierre')->nullable();



            $table->enum('estado', 
                ['abierto', 'cerrado','anulado']
            )->default('abierto');

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
        Schema::dropIfExists('emp_ape_cie_caja');
    }
}
