<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{

    //======================================
    public function up()
    {
        // TODO: NOME E IMAGEM ISADMIN(pro crud)
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id_usuario');

            $table->string('usuario');
            $table->string('senha');
            $table->string('nome');
            $table->string('imagem'); //php artisan storage:link
            $table->string('email');
            $table->string('isAdmin')->default(0); //0:nao , 1:sim

            // $table->rememberToken();
            $table->timestamps();
        });
    }


    //======================================
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
