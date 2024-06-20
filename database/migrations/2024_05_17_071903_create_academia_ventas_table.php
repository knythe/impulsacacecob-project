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
            $table->foreignId('empleado_id')->nullable()->constrained('empleados')->onDelete('set null');
            $table->foreignId('estudiante_id')->nullable()->constrained('estudiantes')->onDelete('set null');//muchas ventas pueden ser realizadas por un
            $table->foreignId('apoderado_id')->nullable()->constrained('apoderados')->onDelete('set null');//muchas ventas pueden involucrar a un estudiante
            $table->foreignId('ciclo_id')->nullable()->constrained('academia_ciclos')->onDelete('set null');//muchas ventas pueden involucrar a un apoderado
            $table->foreignId('comprobante_id')->nullable()->constrained('comprobantes')->onDelete('set null');//muchas ventas pueden involucrar un ciclo
            $table->date('fecha_inscripcion');
            $table->decimal('monto_inicial',8,2)->unsigned();
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
        Schema::dropIfExists('academia_ventas');
    }
};
