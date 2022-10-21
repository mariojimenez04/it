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
            //Añadir campo a la tabla
            $table->string('pallet');
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
            //Eliminar campo de la tabla
            $table->dropColumn('pallet');
        });
    }
};
