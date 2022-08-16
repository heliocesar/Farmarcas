<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColaboradorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colaborador', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('email', 45)->nullable()->unique('email_UNIQUE');
            $table->string('nome_completo', 45)->nullable();
            $table->string('cpf', 45)->nullable()->unique('cpf_UNIQUE');
            $table->string('rg', 45)->nullable();
            $table->string('data_nascimento', 45)->nullable();
            $table->string('cep', 45)->nullable();
            $table->string('logradouro', 45)->nullable();
            $table->string('numero', 45)->nullable();
            $table->string('cidade', 45)->nullable();
            $table->string('estado', 45)->nullable();
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
        Schema::dropIfExists('colaborador');
    }
}
