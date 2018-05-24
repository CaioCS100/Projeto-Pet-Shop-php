<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoTabelaAnimais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animais', function (Blueprint $table) {
            $table->increments('id_pet');
            $table->string('nome_dono');
            $table->string('nome_pet');
            $table->date('data_de_nascimento_pet');
            $table->float('peso',5,2);
            $table->string('sexo',1);
            $table->string('cor');
            $table->string('info_pet_cadastro');
            $table->string('observacao_sobre_pet');
            $table->string('nome_da_imagem')->default('');
            $table->integer('id_especie');
            $table->integer('id_raca');
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
        Schema::dropIfExists('animais');
    }
}
