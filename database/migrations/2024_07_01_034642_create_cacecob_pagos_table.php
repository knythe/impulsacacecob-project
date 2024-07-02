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
        Schema::create('cacecob_pagos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clientecacecob_id')->nullable();
            $table->foreign('clientecacecob_id')->references('id')->on('cacecob_clientes')->onDelete('set null');
            $table->unsignedBigInteger('comprobante_id')->nullable();
            $table->foreign('comprobante_id')->references('id')->on('comprobantes')->onDelete('set null');
            $table->tinyInteger('estado')->default(1);
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
        Schema::dropIfExists('cacecob_pagos');
    }
};
