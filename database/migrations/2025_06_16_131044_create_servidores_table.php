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
        Schema::create('servidores', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('entidade');
            $table->string('matricula');
            $table->string('nome_servidor')->nullable();
            $table->string('lotacao')->nullable();
            $table->string('orgao')->nullable();
            $table->string('vinculo_empregaticio')->nullable();
            $table->date('data_admissao');
            $table->string('situacao');
            $table->string('classificacao_cargo');
            $table->string('classificacao_afastamento')->nullable();

            // Referência para cargos.id
            $table->uuid('cargo_id');
            $table->foreign('cargo_id')->references('id')->on('cargos')->onDelete('cascade');
            $table->decimal('remuneracao_contratual', 15, 2);
            $table->decimal('contribuicao_empregado_rgps', 15, 2)->nullable();
            $table->decimal('contribuicao_empregado_rat_fat', 15, 2)->nullable();
            $table->decimal('contribuicao_patronal_rgps', 15, 2)->nullable();
            $table->string('efetivo_em_cargo_comissionado')->nullable();
            $table->decimal('carga_horaria_semanal', 5, 2);
            $table->decimal('carga_horaria_mensal', 5, 2)->nullable();
            $table->string('organograma')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servidores');
    }
};
