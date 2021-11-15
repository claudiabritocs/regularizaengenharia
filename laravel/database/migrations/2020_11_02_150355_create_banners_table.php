<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ordem')->default(0);
            $table->string('imagem');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('banners');
    }
}
