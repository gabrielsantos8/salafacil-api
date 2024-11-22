<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificacoesTable extends Migration
{
    public function up()
    {
        Schema::create('notificacoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->constrained('users');
            $table->string('mensagem');
            $table->enum('tipo', ['reserva', 'cancelamento', 'lembrete']);
            $table->timestamp('criado_em');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notificacoes');
    }
}
