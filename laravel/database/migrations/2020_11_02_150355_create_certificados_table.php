<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificadosTable extends Migration
{
    public function up()
    {
        Schema::create('certificados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('imagem');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('certificados');
    }
}
