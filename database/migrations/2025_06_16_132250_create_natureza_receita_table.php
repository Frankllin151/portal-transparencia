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
        Schema::create('natureza_receita', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('codigo'); // Ex: 413210101010000
            $table->string('descricao'); // Ex: RENDIMENTOS DE APLICAÇÕES FINANCEIRAS
            $table->string('categoria_economica'); // Ex: Receitas Correntes
            $table->string('origem'); // Ex: Receita Patrimonial
            $table->string('especie'); // Ex: Valores Mobiliários
            $table->string('tipo'); // Ex: Receita Corrente
            $table->string('rubrica');
            $table->string('alinea');
            $table->string('subalinea');
            $table->string('desdobramento_nivel_1');
            $table->string('desdobramento_nivel_2');
            $table->string('desdobramento_nivel_3');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('natureza_receita');
    }
};
