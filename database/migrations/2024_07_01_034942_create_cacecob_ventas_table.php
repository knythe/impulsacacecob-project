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
        Schema::create('cacecob_ventas', function (Blueprint $table) {
            $table->id();
            //
            $table->unsignedBigInteger('clientecacecob_id')->nullable();
            $table->foreign('clientecacecob_id')->references('id')->on('cacecob_clientes')->onDelete('set null');
            //
            $table->unsignedBigInteger('empleado_id')->nullable();
            $table->foreign('empleado_id')->references('id')->on('empleados')->onDelete('set null');
            //
            $table->unsignedBigInteger('pagocacecob_id')->nullable();
            $table->foreign('pagocacecob_id')->references('id')->on('cacecob_pagos')->onDelete('set null');
            //
            $table->unsignedBigInteger('evento_id')->nullable();
            $table->foreign('evento_id')->references('id')->on('cacecob_eventos')->onDelete('set null');
            //
            $table->string('certificado',80);
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
        Schema::dropIfExists('cacecob_ventas');
    }
};
