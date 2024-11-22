<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfiguracoesSistemaTable extends Migration
{
    public function up()
    {
        Schema::create('configuracoes_sistema', function (Blueprint $table) {
            $table->id();
            $table->string('nome_configuracao');
            $table->string('valor_configuracao');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('configuracoes_sistema');
    }
}