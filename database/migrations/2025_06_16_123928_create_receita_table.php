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
        Schema::create('receita', function (Blueprint $table) {
           $table->uuid('id')->primary(); // UUID como chave primária
            $table->date('data');
            // Chave estrangeira (relaciona com NaturezaReceita)
           // $table->foreign('natureza_id')->references('id')->on('natureza_receita')->onDelete('cascade'); 
            $table->string('finalidade');
            $table->string('forma_ingresso');
            $table->decimal('valor_orcado_inicial', 15, 2)->nullable();
            $table->decimal('valor_orcado_atualizado', 15, 2)->nullable();
            $table->decimal('valor_deducoes_orcado', 15, 2)->nullable();
            $table->decimal('valor_arrecadado_mes', 15, 2)->nullable();
            $table->decimal('valor_arrecadado_acumulado', 15, 2)->nullable();
            $table->decimal('valor_deducoes_mes', 15, 2)->nullable();
            $table->decimal('valor_lancado_mes', 15, 2)->nullable();
            $table->decimal('valor_lancado_periodo', 15, 2)->nullable();
            $table->boolean('receita_corrente_liquida')->default(false);
            $table->decimal('realizado_percentual', 5, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receita');
    }
};
