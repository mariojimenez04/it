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
        Schema::create('movimiento_usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('movimiento')->nullable();
            $table->string('usuario')->nullable();
            $table->string('equipo')->nullable();
            $table->string('direccion_ip')->nullable();
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
        Schema::dropIfExists('movimiento_usuarios');
    }
};
