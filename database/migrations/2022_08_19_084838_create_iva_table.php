<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIvaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ivas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('dni');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('correo');
            $table->string('cod_postal');
            $table->string('iva');
            $table->string('irpf');
            $table->string('ref_cliente');
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
        Schema::dropIfExists('ivas');
    }
}
