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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('linea')->nullable();
            $table->string('isla')->nullable();
            $table->string('codigo')->nullable();
            $table->string('producto')->nullable();
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->string('color')->nullable();
            $table->string('cantidad')->nullable();
            $table->string('comentarios')->nullable();
            $table->string('moificado_por')->nullable();
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
        Schema::dropIfExists('productos');
    }
};
