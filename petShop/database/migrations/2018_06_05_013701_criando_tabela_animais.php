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
            $table->increments('id');
            $table->integer('nome_dono_id')->unsigned();
            $table->foreign('nome_dono_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->string('nome_pet');
            $table->date('data_de_nascimento_pet');
            $table->float('peso',5,2);
            $table->string('sexo',1);
            $table->string('cor');
            $table->string('info_pet_cadastro');
            $table->string('observacao_sobre_pet');
            $table->string('nome_da_imagem')->default('');
            $table->integer('especie_id')->unsigned();
            $table->foreign('especie_id')->references('id')->on('especies')->onDelete('cascade');
            $table->integer('raca_id')->unsigned();
            $table->foreign('raca_id')->references('id')->on('racas')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
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
