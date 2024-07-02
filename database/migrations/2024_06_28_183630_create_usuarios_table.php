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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            /*Supongamos que estamos definiendo una migración para la tabla 
            usuarios que tiene una relación con la tabla roles. Queremos que cada usuario 
            tenga un rol, y si un rol es eliminado, queremos eliminar al usuario, 
            sino simplemente eliminar la referencia al rol.*/
            $table->unsignedBigInteger('role_id')->nullable();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('set null');
            //
            $table->string('user', 50)->unique();
            $table->string('contraseña', 50);
            $table->string('nombres', 100);
            $table->string('email', 100)->unique();
            $table->timestamp('fecha_registro')->useCurrent();
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
        Schema::dropIfExists('usuarios');
    }
};
