<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMoneda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_monedas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);

            // $, Gs., 
            $table->string('simbolo', 5)->default('');

            // Cantidad de decimales
            $table->integer('precision')->default(2);

            $table->char('separador_miles', 1)->default(',');
            $table->char('separador_decimal', 1)->default('.');
            $table->char('codigo', 3)->unique();
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
        Schema::dropIfExists('emp_monedas');
    }
}
