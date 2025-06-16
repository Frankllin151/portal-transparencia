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
        Schema::create('pagamentosreceitasdespesasextraorcamentaria', function (Blueprint $table) {
             $table->uuid('id')->primary();
            $table->string('cpf_cnpj_beneficiario');
            $table->string('data_pagamento');
            $table->string('historico');
            $table->string('nome_beneficiario');
            $table->string('numero_pagamento');
            $table->string('valor');
            $table->foreign('receita_depesa_extraorcamentaria_id')->references('id')->on('receitasdespesasextraorcamentaria')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagamentosreceitasdespesasextraorcamentaria');
    }
};
