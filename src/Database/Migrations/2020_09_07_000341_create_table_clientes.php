<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableClientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_clientes', function (Blueprint $table) {
            $table->id();

            $table->string('nombre', 50);
            $table->string('telefono',30)->nullable();
            $table->string('telefono2',30)->nullable();
            $table->string('codigo', 30)->nullable();

            $table->integer('ci')->nullable()->unique();
            $table->string('ruc')->nullable()->unique();

            $table->integer('estado')->default(1);

            $table->string('email',50)->nullable();
            $table->string('direccion', 100)->nullable();
            $table->string('ubicacion_geo')->nullable();
            $table->enum('genero', ['NE', 'M', 'F'])->nullable();

            $table->dateTime('fecha_ingreso')->nullable();
            $table->dateTime('fecha_nacimiento')->nullable();

            $table->enum('tipo_cliente', ['P', 'E'])
                ->default('P');
            $table->bigInteger('limite_cta_cte')->nullable();
            $table->bigInteger('saldo')->nullable();

            // Representa al cargo actual del cliente
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
        Schema::dropIfExists('clientes');
    }
}
