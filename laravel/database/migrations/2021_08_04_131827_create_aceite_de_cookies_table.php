<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateAceiteDeCookiesTable extends Migration
{
    public function up()
    {
        Schema::create('aceite_de_cookies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ip');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('aceite_de_cookies');
    }
}
