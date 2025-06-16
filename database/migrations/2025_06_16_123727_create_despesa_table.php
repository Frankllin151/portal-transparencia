<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('despesa', function (Blueprint $table) {
            $table->uuid('id')->primary(); // UUID como chave primária
            $table->integer('ano_exercicio');
            $table->string('numero_empenho');
            $table->string('tipo_empenho');
            $table->string('categoria_empenho');
            $table->text('historico_empenho');
            $table->decimal('valor_empenho', 15, 2)->nullable();
            $table->decimal('valor_liquidado', 15, 2)->nullable();
            $table->decimal('valor_pago', 15, 2)->nullable();
            $table->decimal('valor_orcado', 15, 2)->nullable();
            $table->decimal('valor_atualizado', 15, 2)->nullable();
            $table->decimal('valor_alterado', 15, 2)->nullable();
            $table->decimal('porcentagem_empenhado_sobre_orcado', 5, 2)->nullable();
            $table->decimal('porcentagem_liquidado_sobre_orcado', 5, 2)->nullable();
            $table->decimal('porcentagem_pago_sobre_orcado', 5, 2)->nullable();
            $table->date('data_empenho')->nullable();
            $table->date('data_liquidacao')->nullable();
            $table->date('data_pagamento')->nullable();
            $table->string('finalidade_programa');
            $table->string('objetivo_programa');
            $table->string('tipo_acao_programa');
            $table->string('entidade');
            $table->string('orgao');
            $table->string('codigo_orgao');
            $table->string('unidade');
            $table->string('codigo_unidade');
            $table->string('credor_nome');
            $table->string('credor_cnpj_cpf');
            $table->string('credor_natureza_juridica');
            $table->string('codigo_funcao');
            $table->string('descricao_funcao');
            $table->string('codigo_subfuncao');
            $table->string('descricao_subfuncao');
            $table->string('codigo_programa');
            $table->string('descricao_programa');
            $table->string('codigo_acao');
            $table->string('descricao_acao');
            $table->string('codigo_elemento');
            $table->string('descricao_elemento');
            $table->string('mascara_natureza');
            $table->string('natureza_despesa');
            $table->string('codigo_recurso');
            $table->string('descricao_recurso');
            $table->string('tipo_recurso');
            $table->string('modalidade_aplicacao');
            $table->string('tipo_poder');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('despesa');
    }
};
