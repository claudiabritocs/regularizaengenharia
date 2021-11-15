<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjetosTable extends Migration
{
    public function up()
    {

        Schema::create('projetos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('capa');
            $table->string('titulo');
            $table->text('paragrafo');
            $table->string('slug');
            $table->timestamps();
        });

        Schema::create('projetos_imagens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('projeto_id')->unsigned();
            $table->string('imagem');
            $table->timestamps();
            $table->foreign('projeto_id')->references('id')->on('projetos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('projetos_imagens');
        Schema::drop('projetos');
    }
}
