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
        // contratos_item
        Schema::table('contratos_item', function (Blueprint $table) {
            if (!Schema::hasColumn('contratos_item', 'contrato_id')) {
                $table->uuid('contrato_id')->after('id');
            }
            $table->foreign('contrato_id')
                  ->references('id')
                  ->on('contratos')
                  ->onDelete('cascade');
        });

        // servidores
        Schema::table('servidores', function (Blueprint $table) {
            if (!Schema::hasColumn('servidores', 'cargo_id')) {
                $table->uuid('cargo_id')->after('id');
            }
            $table->foreign('cargo_id')
                  ->references('id')
                  ->on('cargos')
                  ->onDelete('cascade');
        });

        // pagamentosreceitasdespesasextraorcamentaria
       Schema::table('pagamentosreceitasdespesasextraorcamentaria', function (Blueprint $table) {
    if (!Schema::hasColumn('pagamentosreceitasdespesasextraorcamentaria', 'receita_depesa_extraorcamentaria_id')) {
        $table->uuid('receita_depesa_extraorcamentaria_id')->after('valor');
    }
    $table->foreign('receita_depesa_extraorcamentaria_id', 'fk_pagamentos_receita_id')
          ->references('id')
          ->on('receitasdespesasextraorcamentaria')
          ->onDelete('cascade');
});

        // receita
        Schema::table('receita', function (Blueprint $table) {
            if (!Schema::hasColumn('receita', 'natureza_id')) {
                $table->uuid('natureza_id')->after('id');
            }
            $table->foreign('natureza_id')
                  ->references('id')
                  ->on('natureza_receita')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contratos_item', function (Blueprint $table) {
            $table->dropForeign(['contrato_id']);
        });

        Schema::table('servidores', function (Blueprint $table) {
            $table->dropForeign(['cargo_id']);
        });

        Schema::table('pagamentosreceitasdespesasextraorcamentaria', function (Blueprint $table) {
            $table->dropForeign(['receita_depesa_extraorcamentaria_id']);
        });

        Schema::table('receita', function (Blueprint $table) {
            $table->dropForeign(['natureza_id']);
        });
    }
};
