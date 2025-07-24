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
        Schema::create('contratos_item', function (Blueprint $table) {
           $table->uuid('id')->primary();
            $table->integer('codigo_item_contrato');
            $table->string('descricao_item_contrato');
            $table->string('unidade_medida');
            $table->integer('quantidade');
            $table->decimal('valor_unitario', 15, 2);
            $table->decimal('valor_total', 15, 2);
            // Chave estrangeira para contratos
      /// $table->uuid('contrato_id');
         //$table->foreign('contrato_id')->references('id')->on('contratos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contraltos_item');
    }
};
