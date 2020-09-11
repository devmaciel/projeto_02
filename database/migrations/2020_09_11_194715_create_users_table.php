<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{

    //======================================
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id_usuario');

            $table->string('usuario');
            $table->string('senha');
            $table->string('email');

            $table->rememberToken();
            $table->timestamps();
        });
    }


    //======================================
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
