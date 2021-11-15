<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfiguracoesTable extends Migration
{
    public function up()
    {
        Schema::create('configuracoes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->text('keywords');
            $table->string('imagem_de_compartilhamento');
            $table->string('analytics');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('configuracoes');
    }
}
