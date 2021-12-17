<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagensTable extends Migration
{
    public function up()
    {
        Schema::create('imagens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ordem')->default(0);
            $table->string('imagem');
            $table->string('link');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('imagens');
    }
}
