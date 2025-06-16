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
        Schema::create('contratos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('entidade');
            $table->date('data_assinatura');
            $table->string('numero_contrato');
            $table->integer('numero_processo');
            $table->integer('ano');
            $table->string('modalidade_licitacao');
            $table->string('tipo_contrato');
            $table->string('contratado');
            $table->date('data_vigencia_inicial');
            $table->date('data_vigencia_final');
            $table->string('situacao');
            $table->decimal('valor_inicial', 15, 2);
            $table->decimal('valor_final', 15, 2);
            $table->string('competencia');
            $table->string('instrumento_contrato');
            $table->string('codigo_fornecedor');
            $table->string('codigo_processo');
            $table->integer('numero_licitacao');
            $table->string('subcontratacao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contraltos');
    }
};
