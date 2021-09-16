<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_item', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('enlace');
            $table->string('icono');
            $table->unsignedBigInteger('id_menu');

            $table->foreign("id_menu")->references("id")->on("config_menu")
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
        Schema::dropIfExists('config_item');
    }
}
