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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('apoderado_id')->nullable();
            $table->foreign('apoderado_id')->references('id')->on('apoderados')->onDelete('set null');
            $table->string('nombres', 80);
            $table->string('apellidos', 80);
            $table->string('dni', 10)->unique();
            $table->string('telefono', 15)->default('S/N');
            $table->string('email',80)->default('S/E');
            $table->string('sede', 20);
            $table->string('direccion',100);
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
        Schema::dropIfExists('estudiantes');
    }
};
