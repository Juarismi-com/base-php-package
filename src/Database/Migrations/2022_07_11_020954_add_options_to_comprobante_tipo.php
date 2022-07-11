<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOptionsToComprobanteTipo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('emp_comprobante_tipo', function (Blueprint $table) {
          $table->boolean('venta')->nullable()->default(false);
          $table->boolean('presupuesto')->nullable()->default(false);
          $table->boolean('compra')->nullable()->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('emp_comprobante_tipo', function (Blueprint $table) {
            //
        });
    }
}
