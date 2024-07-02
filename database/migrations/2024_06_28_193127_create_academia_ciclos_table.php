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
        Schema::create('academia_ciclos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_ciclo', 100);
            $table->date('fecha_inicio');
            $table->date('fecha_finalizacion');
            $table->decimal('costo', 10, 0);
            $table->string('campus',50);
            $table->string('direccion_campus',250);
            $table->string('referencia_campus',250);
            $table->unsignedBigInteger('empleado_id')->nullable();
            $table->foreign('empleado_id')->references('id')->on('empleados')->onDelete('set null'); // campo de personal responsable
            $table->timestamp('fecha_registro')->useCurrent(); // Establece la fecha y hora actuales al crear un registro
            $table->tinyInteger('estado')->default(1);
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
        Schema::dropIfExists('academia_ciclos');
    }
};
