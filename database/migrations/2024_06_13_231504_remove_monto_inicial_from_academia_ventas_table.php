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
        Schema::table('academia_ventas', function (Blueprint $table) {
            $table->dropColumn('monto_inicial');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('academia_ventas', function (Blueprint $table) {
            $table->decimal('monto_inicial',8,2)->unsigned();
        });
    }
};
