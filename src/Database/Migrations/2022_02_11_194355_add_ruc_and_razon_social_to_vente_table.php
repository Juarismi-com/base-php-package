<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRucAndRazonSocialToVenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('emp_ventas', function (Blueprint $table) {
            $table->string('ruc')->nullable();
            $table->string('razon_social')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('emp_ventas', function (Blueprint $table) {
            //
        });
    }
}
