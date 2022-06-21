<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEmpMovimientos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_movimientos', function (Blueprint $table) {
            $table->id();

            // Relacionado al cliente o al proveedor
            $table->bigInteger('cliente_id')->nullable();
            $table->bigInteger('proveedor_id')->nullable();
            $table->bigInteger('empleado_id')->nullable();
            $table->bigInteger('sucursal_id')->nullable();
            $table->bigInteger('caja_id')
                ->nullable()
                ->default(1);

            // Relacionado al usuario
            $table->integer('creador_id')->nullable();
            $table->dateTime('fecha_creacion', 0);

            // Relacionado al motivo_tipo/movimiento_tipo, y tambien al tipo de la cuenta
            // Normalmebnte 1 = entrada, 2 salida, 3 = retiro 4 = vales 
            $table->bigInteger('movimientotipo_id');
            $table->integer('tipo_cuenta')->nullable();

            $table->text('observacion')->nullable();

            // Relacionado al movimiento en cuestion
            // El saldo que queda luego de ejecutar cada paso
            $table->bigInteger('monto_movimiento');
            $table->bigInteger('saldo_movimiento')->default(0);

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
        Schema::dropIfExists('emp_movimiento_tipo');
    }
}
