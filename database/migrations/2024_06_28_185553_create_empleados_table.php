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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id')->unique()->nullable(); // usuario unico para empleado
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('set null');
            $table->unsignedBigInteger('area_id')->nullable();
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('set null');
            $table->string('nombres', 50);
            $table->string('apellidos', 50);
            $table->string('dni', 10);
            $table->string('email', 50);
            $table->string('telefono', 15);
            $table->date('fecha_nacimiento')->nullable();
            $table->string('direccion', 250)->nullable();
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
        Schema::dropIfExists('empleados');
    }
};
