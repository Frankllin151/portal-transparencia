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
         Schema::create('group_user', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // This is fine for user_id assuming users.id is an integer

            // --- CHANGE THIS LINE ---
            // Instead of foreignId(), explicitly define it as a UUID column
            $table->uuid('group_id');
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            // --- END CHANGE ---

            $table->primary(['user_id', 'group_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_user');
    }
};
