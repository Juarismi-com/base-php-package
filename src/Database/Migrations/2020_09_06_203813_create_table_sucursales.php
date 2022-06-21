<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSucursales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_sucursales', function (Blueprint $table) {
            $table->id();

            $table->string('nombre_sucursal', 100);
            $table->string('direccion', 100)->nullable();
            $table->string('telefono', 30)->nullable();
            $table->string('telefono2', 30)->nullable();
            $table->string('email', 100)->nullable();
            $table->integer('numero_sucursal')->nullable();

            $table->bigInteger('factura_timbrado')->nullable();
            $table->dateTime('emision_timbrado')->nullable();
            $table->dateTime('vto_timbrado')->nullable();

            $table->integer('ciudad_id')->nullable();
            $table->integer('empresa_id')->nullable();

            // Relacionado al usuario responsable de la sucursal
            $table->integer('responsable_id')->nullable();

            // El ultimo comprobante del talonario
            $table->integer('ultimo_comprobante')->nullable();
            
            // Relacionado a la serie en el tipo de comprobante
            $table->string('serie_comprobante')->nullable();

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
        Schema::dropIfExists('emp_sucursales');
    }
}
