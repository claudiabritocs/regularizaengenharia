<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetosTable extends Migration
{
    public function up()
    {
        Schema::create('projetos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ordem')->default(0);
            $table->string('capa');
            $table->string('slug_pt');
            $table->string('titulo_pt');
            $table->string('localizacao_pt');
            $table->text('descritivo_pt');
            $table->string('cor_texto');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('projetos');
    }
}
