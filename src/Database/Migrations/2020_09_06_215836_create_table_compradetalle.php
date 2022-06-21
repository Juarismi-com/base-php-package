
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCompradetalle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_compra_detalle', function (Blueprint $table) {
            $table->id();

            $table->integer('producto_id');
            $table->integer('compra_id');

            $table->integer('precio');
            $table->integer('nro_factura')->nullable();
            $table->string('serie_factura')->nullable();
            $table->string('concepto')->nullable();

            // iva por defecto 5 o 10
            $table->float('impuesto')->nullable()
                ->default(0.10);
                
            $table->integer('cantidad')->nullable();
            $table->dateTime('fecha')->nullable();
            $table->string('estado')->nullable();
            $table->text('observacion')->nullable();
            $table->bigInteger('precio_x_cantidad')->nullable();

             // Empleado asignado
            $table->integer('atendedor_id')->nullable();


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
        Schema::dropIfExists('emp_compra_detalle');
    }
}
