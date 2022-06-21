<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMarca extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_marcas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_marca', 50)->unique();
            $table->integer('estado')->default(1);

            // Si es un producto, servicio, etc, por defecto null
            $table->string('tipo', 30)->nullable();
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
        Schema::dropIfExists('emp_marcas');
    }
}
