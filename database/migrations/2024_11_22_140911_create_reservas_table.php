<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->constrained('users');
            $table->foreignId('ambiente_id')->constrained('ambientes');
            $table->timestamp('horario_inicio')->nullable();
            $table->timestamp('horario_fim')->nullable();
            $table->enum('status', ['ativa', 'cancelada']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservas');
    }
}
