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
        Schema::create('processoslicitatorios', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('entidade');
            $table->integer('numero_processo');
            $table->integer('ano_processo');
            $table->integer('numero_licitacao');
            $table->integer('ano_licitacao');
            $table->string('modalidade');
            $table->string('tipo_objeto');
            $table->string('forma_julgamento');
            $table->string('situacao');
            $table->date('data_homologacao');
            $table->string('cidade_certame');
            $table->string('estado_certame');
            $table->dateTime('data_hora_abertura_envelopes');
            $table->dateTime('inicio_recebimento_envelopes');
            $table->dateTime('termino_recebimento_envelopes');
            $table->date('data_criacao');
            $table->string('forma_contratacao');
            $table->string('registro_precos');
            $table->string('nome_contato');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('processoslicitatorios');
    }
};
