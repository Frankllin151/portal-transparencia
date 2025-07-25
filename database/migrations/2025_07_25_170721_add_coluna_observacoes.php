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
         Schema::table('servidores', function (Blueprint $table) {
            $table->text('observacoes')->nullable()->after('orgao');
        });

        Schema::table('pagamentosreceitasdespesasextraorcamentaria', function (Blueprint $table) {
            $table->text('observacoes')->nullable()->after('historico');
        });

        Schema::table('processoslicitatorios', function (Blueprint $table) {
            $table->text('observacoes')->nullable()->after('modalidade');
        });

        Schema::table('receita', function (Blueprint $table) {
            $table->text('observacoes')->nullable()->after('finalidade');
        });

        Schema::table('despesa', function (Blueprint $table) {
            $table->text('observacoes')->nullable()->after('historico_empenho');
        });

        Schema::table('contratos', function (Blueprint $table) {
            $table->text('observacoes')->nullable()->after('contratado');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
