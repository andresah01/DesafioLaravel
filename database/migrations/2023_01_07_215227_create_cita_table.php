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
        Schema::create('cita', function (Blueprint $table) {
            $table->id('id_cita');
            $table->dateTime('fecha_cita');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->bigInteger('id_cliente')->unsigned();
            $table->bigInteger('id_estado')->unsigned();
            $table->string('mascota');
            $table->foreign('id_cliente')->references('documento')->on('cliente');
            $table->foreign('id_estado')->references('id_estado')->on('estado_cita');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cita');
    }
};
