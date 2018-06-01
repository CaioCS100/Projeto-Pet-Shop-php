<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoTabelaClientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('cpf',11)->unique();
            $table->date('data_de_nascimento');
            $table->string('cep',8);
            $table->string('telefone',9);
            $table->string('ddd',2);
            $table->string('email');
            $table->string('endereco');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('uf',2);
            $table->string('observacao_cliente');
            $table->string('complemento');
            $table->string('nome_da_imagem')->default('');
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
        Schema::dropIfExists('clientes');
    }
}
