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
        Schema::create('comprobantes', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_operacion', 30); // completar solo si se genero una transferencia
            $table->string('numero_comprobante'); 
            $table->string('tipo_pago', 20); //metodo de pago en la view
            $table->date('fecha_pago'); 
            $table->decimal('monto', 10, 0);
            $table->string('observaciones', 250);
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
        Schema::dropIfExists('comprobantes');
    }
};
