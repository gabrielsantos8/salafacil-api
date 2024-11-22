<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmbientesTable extends Migration
{
    public function up()
    {
        Schema::create('ambientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('tipo');
            $table->enum('status', ['disponivel', 'reservado', 'manutencao']);
            $table->text('descricao');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ambientes');
    }
}
