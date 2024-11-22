<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoricoReservasTable extends Migration
{
    public function up()
    {
        Schema::create('historico_reservas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reserva_id')->constrained('reservas');
            $table->text('alteracoes');
            $table->timestamp('modificado_em');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('historico_reservas');
    }
}
