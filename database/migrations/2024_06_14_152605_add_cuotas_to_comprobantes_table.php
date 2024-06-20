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
        Schema::table('comprobantes', function (Blueprint $table) {
            //
            $table->decimal('primera_cuota', 10, 0)->nullable();
            $table->decimal('segunda_cuota', 10, 0)->nullable();
            $table->decimal('tercera_cuota', 10, 0)->nullable();
            $table->decimal('cuarta_cuota', 10, 0)->nullable();
            $table->decimal('quinta_cuota', 10, 0)->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comprobantes', function (Blueprint $table) {
            //
            $table->dropColumn('primera_cuota');
            $table->dropColumn('segunda_cuota');
            $table->dropColumn('tercera_cuota');
            $table->dropColumn('cuarta_cuota');
            $table->dropColumn('quinta_cuota');


        });
    }
};
