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
        Schema::create('classificacao', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("nome");
           $table->timestamps();
        });

         Schema::create('fonte_recurso', function (Blueprint $table) {
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
        Schema::dropIfExists('classificacao');
    }
};
