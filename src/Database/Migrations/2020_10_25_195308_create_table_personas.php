<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePersonas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cm_personas', function (Blueprint $table) {
            $table->id();

            $table->string('nombre', 50);
            $table->string('apellido', 50)->nullable();
            $table->string('telefono',30)->nullable();
            $table->integer('ci')->nullable()->unique();
            $table->string('email',50)->nullable();
            
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
        Schema::dropIfExists('cm_personas');
    }
}
