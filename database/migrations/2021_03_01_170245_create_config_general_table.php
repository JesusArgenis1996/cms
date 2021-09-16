<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigGeneralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_general', function (Blueprint $table) {
            $table->id();
            $table->string('fuente');
            $table->string('size');
            $table->string('logo');
            $table->string('fondo_principal');
            $table->string('titulo');
            $table->string('favicon');
            $table->string('mapa');
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
        Schema::dropIfExists('config_general');
    }
}
