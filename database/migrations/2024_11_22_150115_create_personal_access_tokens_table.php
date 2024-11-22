<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalAccessTokensTable extends Migration
{
    /**
     * Execute a migration para criar a tabela personal_access_tokens.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();
            // Definição do campo para tipo do token (referencia ao tipo de modelo)
            $table->string('tokenable_type');
            // Definição da chave estrangeira para usuários (não tokenables)
            $table->foreignId('tokenable_id')
                  ->constrained('usuarios')  // A tabela que deve ser referenciada
                  ->onDelete('cascade');     // Apagar os tokens ao deletar usuário
            // Nome do token gerado
            $table->string('name');
            // Valor do token gerado
            $table->text('token');
            // Permissões do token (opcional)
            $table->text('abilities')->nullable();
            // Data de expiração do token
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverter a migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_access_tokens');
    }
}
