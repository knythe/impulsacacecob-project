<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academia_ventas', function (Blueprint $table) {
            $table->id();
            //
            $table->unsignedBigInteger('estudiante_id')->nullable();
            $table->foreign('estudiante_id')->references('id')->on('estudiantes')->onDelete('set null');
            //
            $table->unsignedBigInteger('pago_id')->nullable();
            $table->foreign('pago_id')->references('id')->on('pagos')->onDelete('set null');
            //
            $table->unsignedBigInteger('ciclo_id')->nullable();
            $table->foreign('ciclo_id')->references('id')->on('academia_ciclos')->onDelete('set null');
            //
            $table->unsignedBigInteger('empleado_id')->nullable();
            $table->foreign('empleado_id')->references('id')->on('empleados')->onDelete('set null');
            //
            $table->string('cant_material',50); // material paquete de hojas
            $table->string('prenda',50); // RESERVADO - ENTREGADO 
            $table->tinyInteger('estado')->default(1); // DEUDOR - NO ADEUDADO - RETIRADO 
            $table->timestamp('fecha_registro')->useCurrent(); // Establece la fecha y hora actuales al crear un registro
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
        Schema::dropIfExists('academia_ventas');
    }
};
