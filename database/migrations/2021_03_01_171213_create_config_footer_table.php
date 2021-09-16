<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigFooterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_footer', function (Blueprint $table) {
            $table->id();
            $table->string('color');
            $table->string('background');
            $table->string('cr');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('correo');
            $table->string('horario');
            $table->unsignedBigInteger('id_pagina');

            $table->foreign("id_pagina")->references("id")->on("pagina")
            ->onDelete("cascade")
            ->onUpdate("cascade");
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
        Schema::dropIfExists('config_footer');
    }
}
