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
        Schema::table('laptop_detalles', function (Blueprint $table) {
            //
            $table->string('devolucion')->nullable();
            $table->boolean('cantidad_devolucion')->nullable();
            $table->string('motivo_devolucion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('laptop_detalles', function (Blueprint $table) {
            //
            $table->dropColumn('devolucion');
            $table->dropColumn('cantidad_devolucion');
            $table->dropColumn('motivo_devolucion');
        });
    }
};
