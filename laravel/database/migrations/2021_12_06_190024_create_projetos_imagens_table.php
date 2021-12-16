<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetosImagensTable extends Migration
{
    public function up()
    {
        Schema::create('projetos_imagens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('projeto_id')->unsigned();
            $table->foreign('projeto_id')->references('id')->on('projetos')->onDelete('cascade');
            $table->integer('ordem')->default(0);
            $table->string('imagem');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('projetos_imagens');
    }
}
