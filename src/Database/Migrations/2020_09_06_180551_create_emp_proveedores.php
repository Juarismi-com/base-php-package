<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpProveedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_proveedores', function (Blueprint $table) {
            $table->id();

            // Representa el nombre completo del proveedor 
            $table->string('nombre', 50);
            $table->string('codigo')->nullable();
            $table->string('telefono',30)->nullable();
            $table->string('telefono2',30)->nullable();

            // Numero documento puede representar el RUC o CI o pasaporte
            $table->string('nro_documento', 20)->unique()->nullable();
            $table->string('direccion', 100)->nullable();
            $table->string('email', 100)->nullable();

            // P = Persona o E es Empresa
            $table->enum('tipo_proveedor', ['P', 'E'])
                ->default('P');
            $table->string('limite_cta_cte')->nullable();
            $table->string('ubicacion_geo')->nullable();
            $table->dateTime('fecha_ingreso')->nullable();
            $table->string('uuid')->nullable();

            $table->integer('estado')->default(1);

            // Si el proveedor tiene un usuario
            $table->integer('user_id')->nullable();
            $table->integer('ciudad_id')->nullable();

            // Relacionado a una empresa 
            $table->integer('empresa_id')->nullable();
            $table->integer('persona_id')->nullable();

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
        Schema::dropIfExists('emp_proveedores');
    }
}
