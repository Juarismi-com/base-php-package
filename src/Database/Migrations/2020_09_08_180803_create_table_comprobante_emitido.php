<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableComprobanteEmitido extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_comprabante_emitido', function (Blueprint $table) {
            $table->id();
            $table->integer('sucursal_id')->nullable();
            $table->integer('comprobantetipo_id');
            $table->string('serie_comprobante')->nullable();
            $table->integer('ultimo_nro')->nullable();

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
        Schema::dropIfExists('emp_comprabante_emitido');
    }
}
