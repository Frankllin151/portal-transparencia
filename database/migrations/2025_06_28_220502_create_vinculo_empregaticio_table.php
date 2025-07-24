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
        Schema::create('vinculo_empregaticio', function (Blueprint $table) {
           $table->uuid("id")->primary();
            $table->string("nome");
            $table->timestamps();
        });

        Schema::create('classificacao_afastamento', function (Blueprint $table) {
           $table->uuid("id")->primary();
            $table->string("nome");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vinculo_empregaticio');
    }
};
