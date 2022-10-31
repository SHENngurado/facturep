<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateORTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_o_rs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id');
            $table->foreignId('vehiculo_id');
            $table->string('kilometros');
            $table->string('fecha_entrada');
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
        Schema::dropIfExists('_o_rs');
    }
}
