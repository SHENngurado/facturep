<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('cod_hotel');
            $table->string('direccion')->nullable();
            $table->string('cod_postal')->nullable();
            $table->string('cifdni')->nullable();
            $table->string('telefono')->nullable();
            $table->string('correo')->nullable();
            $table->string('contacto_correo')->nullable();
            $table->string('contacto_nombre')->nullable();
            $table->string('contacto_telefono')->nullable();
            $table->foreignId('cliente_id')->nullable();
            //$table->integer('cliente_id')->nullable()->unsigned();//creamos campo luego relacionamos
            //$table->foreign('cliente_id')->references('id')->on('clientes');
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
        Schema::dropIfExists('vehiculos');
    }
}
