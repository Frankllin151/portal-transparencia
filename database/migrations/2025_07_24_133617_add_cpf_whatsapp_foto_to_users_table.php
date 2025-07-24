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
        Schema::table('users', function (Blueprint $table) {
             $table->string('cpf', 14)->unique()->nullable()->after('email');
             $table->string('whatsapp', 20)->nullable()->after('cpf');
              $table->string('foto')->nullable()->after('whatsapp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
             $table->dropColumn('foto');
            $table->dropColumn('whatsapp');
            $table->dropColumn('cpf');
        });
    }
};
