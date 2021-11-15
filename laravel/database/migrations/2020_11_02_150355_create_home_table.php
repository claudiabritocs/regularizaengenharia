<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeTable extends Migration
{
    public function up()
    {
        Schema::create('home', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('subtitulo');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('home');
    }
}
