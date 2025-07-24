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
        Schema::create('movimentacaobancaria', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nome_entidade');
            $table->string('codigo_conta');
            $table->string('codigo_banco');
            $table->string('nome_banco');
            $table->string('numero_agencia');
            $table->string('descricao_agencia');
            $table->string('numero_conta');
            $table->string('tipo_conta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimentacaobancaria');
    }
};
