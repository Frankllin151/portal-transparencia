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
        Schema::create('comprasdiretas', function (Blueprint $table) {
            $table->uuid("id")->primary(); // Coluna de ID primário auto-incrementável
            $table->string('codigo')->nullable(); // Exemplo: 'CÓDIGO'
            $table->string('centro_de_custos')->nullable(); // Exemplo: 'CENTRO DE CUSTOS'
            $table->date('data_da_compra')->nullable(); // Exemplo: 'DATA DA COMPRA'
            $table->text('objeto')->nullable(); // Exemplo: 'OBJETO'
            $table->string('fornecedor')->nullable(); // Exemplo: 'FORNECEDOR'
            $table->string('cnpj_cpf_fornecedor', 20)->nullable(); // Exemplo: 'CNPJ/CPF FORNECEDOR' - ajustado para tamanho máximo de CNPJ/CPF com formatação
            $table->text('fundamentacao')->nullable(); // Exemplo: 'FUNDAMENTAÇÃO'
            $table->string('tipo')->nullable(); // Exemplo: 'TIPO'
            $table->decimal('valor_rs', 10, 2)->nullable(); // Exemplo: 'VALOR R$' - 10 dígitos no total, 2 após a vírgula
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comprasdiretas');
    }
};
