<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaqTable extends Migration
{
    public function up()
    {
        Schema::create('faq', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ordem');
            $table->string('titulo');
            $table->text('paragrafo');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('faq');
    }
}
