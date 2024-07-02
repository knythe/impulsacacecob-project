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
            $table->string('user', 50);
            $table->string('contraseña', 50);
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
/*/*La presente migracion es de la tabla usuarios busca completar los campos de usuarios, y asi mismo al momento de crear
un usuario asignarle un rol dentro del sistema (administrador, asesor, etc), en caso se elimine un rol, el campo
se llegara a visualizar como null, no se eliminara el registro 
public function up()
{
    Schema::create('usuarios', function (Blueprint $table) {
        $table->id();
        $table->foreignId('role_id')->constrained('roles')->onDelete('set null');
        $table->string('user', 50)->unique();
        $table->string('contraseña', 50);
        $table->string('nombres',100);
        $table->string('email',100)->unique();
        $table->timestamp('fecha_registro')->useCurrent();
        $table->tinyInteger('estado')->default(1);
        $table->timestamps();
    });*/