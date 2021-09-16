<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeccionDosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seccion_dos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pagina');
            $table->string('imagen');
            $table->string('descripcion');
            $table->string('titulo');

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
        Schema::dropIfExists('seccion_dos');
    }
}
