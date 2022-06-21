<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEmpleados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_empleados', function (Blueprint $table) {
            $table->id();

            $table->string('nombre_apellido');
            $table->string('ci',20)->nullable();
            $table->string('ruc', 20)->nullable();
            $table->string('telefono')->nullable();
            $table->string('telefono2')->nullable();
            $table->integer('estado')->default(1);

            $table->string('email',50)->nullable();
            $table->string('direccion', 100)->nullable();
            $table->string('ubicacion_geo')->nullable();
            $table->string('codigo', 30)->nullable();

            // NE => No especificado
            $table->enum('genero', ['NE','M', 'F'])->default('NE');

            $table->dateTime('fecha_ingreso')->nullable();
            $table->dateTime('fecha_nacimiento')->nullable();

            // Representa al cargo actual del empleado
            $table->integer('cargo_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('ciudad_id')->nullable();

            $table->string('uuid')->nullable();
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
        Schema::dropIfExists('empleados');
    }
}
