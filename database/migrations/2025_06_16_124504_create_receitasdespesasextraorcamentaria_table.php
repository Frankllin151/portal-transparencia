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
        Schema::create('receitasdespesasextraorcamentaria', function (Blueprint $table) {
            $table->uuid('id')->primary(); // UUID como chave primária
            $table->string('classificacao');
            $table->string('descricao_classificacao');
            $table->string('fonte_recursos');
            $table->string('mascara');
            $table->string('numero');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receitasdespesasextraorcamentaria');
    }
};
