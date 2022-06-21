<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_productos', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->text('descripcion')->nullable();

            // Descripción especifica del producto
            $table->text('presentacion')->nullable();

            $table->dateTime('fecha_publicacion')->nullable();
            
            // Usaurio que publico el producto
            $table->integer('publicador_id')->nullable();
            $table->integer('productotipo_id')->nullable();
            $table->string('marca_id')->nullable();
            $table->string('modelo_id')->nullable();

            $table->string('imagen_path')->nullable();
            $table->integer('estado')->default(1);

            $table->string('codigo')->nullable()->unique();
            $table->string('codigo_externo')->nullable()->unique();
            $table->string('codigo_barras')->nullable()->unique();

            $table->string('slug')->nullable();
            
            $table->string('precio_vta')->nullable();
            $table->string('precio_vta2')->nullable();
            $table->string('precio_vta3')->nullable();
            $table->string('precio_vta4')->nullable();
            $table->string('precio_vta5')->nullable();

            $table->string('precio_compra')->nullable();
            $table->float('iva')->nullable()
                ->default(0.10);
            
            $table->string('moneda_id')->nullable();

            // Fecha en que se replico un producto
            $table->dateTime('fecha_replicacion', 0)->nullable();

            $table->bigInteger('stock_actual')->nullable();
            $table->bigInteger('stock_minimo')->nullable();

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
        Schema::dropIfExists('emp_productos');
    }
}
