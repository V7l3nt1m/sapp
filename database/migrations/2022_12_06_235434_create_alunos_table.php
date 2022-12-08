<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->integer('n_processo');
            $table->string('primeiro_nome');
            $table->string('ultimo_nome');
            $table->string('nome_completo');
            $table->dateTime('data_nasc');
            $table->string('email');
            $table->integer('telefone');
            $table->string('imagem_aluno');
            $table->string('curso');
            $table->string('repetente')->default('nao');
            $table->string('palavra_passe')->default('aluno2022');
            $table->foreignId('user_id')->constrained();










            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alunos');
    }
};
