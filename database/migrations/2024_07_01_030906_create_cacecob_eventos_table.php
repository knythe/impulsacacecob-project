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
        Schema::create('cacecob_eventos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_evento',80); // seminario - diplomado - etc buscar
            $table->string('nombre_evento', 250);
            $table->date('fecha_programada');
            $table->date('fecha_finalizacion');
            $table->string('cant_horas_academicas',3);
            $table->string('modalidad',50); //presencial o virtual
            $table->decimal('costo', 10, 0);
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
        Schema::dropIfExists('cacecob_eventos');
    }
};
