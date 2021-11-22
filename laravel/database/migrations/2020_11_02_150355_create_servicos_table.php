<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicosTable extends Migration
{
    public function up()
    {
        Schema::create('servicos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ordem');
            $table->string('titulo');
            $table->text('paragrafo');
            $table->string('imagem');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('servicos');
    }
}
