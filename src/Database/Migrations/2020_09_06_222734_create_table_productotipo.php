<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProductotipo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_producto_tipo', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('codigo', 20)->nullable();
            $table->string('slug')->nullable();
            $table->integer('estado')->default(1);
            $table->integer('precio')->nullable();

            // Si la categoria se encuentra anidada, tiene un tipo superior
            $table->integer('parent_id')->nullable();
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
        Schema::dropIfExists('emp_producto_tipo');
    }
}
