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
            $table->foreignId('empleado_id')->nullable()->constrained('empleados')->onDelete('set null');//Muchos a uno (muchas ventas pueden ser realizadas por un asesor)
            $table->foreignId('clientecacecob_id')->nullable()->constrained('cacecob_clientes')->onDelete('set null');
            $table->foreignId('comprobante_id')->nullable()->constrained('comprobantes')->onDelete('set null');
            $table->foreignId('evento_id')->nullable()->constrained('cacecob_eventos')->onDelete('set null'); 
            $table->date('fecha_inscripcion');
            $table->decimal('monto', 8, 2)->unsigned();
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
