<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEmpresas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_empresas', function (Blueprint $table) {
            $table->id();
            $table->string('ruc', 20)->nullable();
            $table->string('nombre');
            $table->string('ubicacion_geo')->nullable();

            $table->enum('stock_negativo', ['si', 'no'])
                ->default('si');

            // Gs. USD, etc
            $table->string('simbolo_moneda')->default('Gs.');
            
            $table->string('logo_path')->nullable();
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
        Schema::dropIfExists('emp_empresas');
    }
}
