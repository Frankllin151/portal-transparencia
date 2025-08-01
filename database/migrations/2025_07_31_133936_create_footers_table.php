<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\HttpFoundation\Request;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('footers', function (Blueprint $table) {
           // Using uuid as the primary key
            $table->uuid('id')->primary();

            // Transparency Portal Section
            $table->string('transparency_portal_title')->default('PORTAL DA TRANSPARÊNCIA');
            $table->text('transparency_portal_description')->nullable(); // Can be null if using default or static text

            // Contact Section
            $table->string('contact_address')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();

            // Useful Links (can be stored as JSON for flexibility, or a simple text field)
            $table->json('useful_links')->nullable(); // Example: [{"text": "Despesas", "url": "/despesas"}, ...]

            // Copyright and Legal Links (also potentially JSON or separate fields)
            $table->string('copyright_text')->nullable();
            $table->json('legal_links')->nullable(); // Example: [{"text": "Política de Privacidade", "url": "/politica-de-privacidade"}, ...]

            $table->timestamps();
        });
    }


    public function updateAndStore(Request $request)
    {
        dd($request);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footers');
    }
};
