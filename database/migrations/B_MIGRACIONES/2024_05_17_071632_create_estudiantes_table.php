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
            $table->foreignId('apoderado_id')->nullable()->constrained('apoderados')->onDelete('set null');//muchos estudiantes pueden tener un apoderado
            $table->string('nombres', 80);
            $table->string('apellidos', 80);
            $table->string('dni', 10);
            $table->string('telefono', 15);
            $table->string('sede', 20);
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
        Schema::dropIfExists('estudiantes');
    }
};
