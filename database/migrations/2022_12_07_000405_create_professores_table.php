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
        Schema::create('professores', function (Blueprint $table) {
            $table->id();
            $table->string('primeiro_nome');
            $table->string('ultimo_nome');
            $table->string('nome_completo');
            $table->dateTime('data_nasc');
            $table->string('email');
            $table->integer('telefone');
            $table->string('imagem_professor');
            $table->string('cadeira')->default('PT');
            $table->string('palavra_passe')->default('professor2021');
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
        Schema::dropIfExists('professores');
    }
};
