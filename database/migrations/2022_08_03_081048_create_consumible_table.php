<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumibleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumibles', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('cantidad');
            $table->string('preciounidad');
            $table->float('importe')->nullable();
            $table->foreignId('factura_id');
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
        Schema::dropIfExists('consumibles');
    }
}
