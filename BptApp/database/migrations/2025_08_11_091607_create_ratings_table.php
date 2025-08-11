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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ad_id')->constrained('ads')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // ID de l'entreprise
            $table->string('name'); // Nom du visiteur
            $table->string('email')->nullable(); // Email du visiteur (optionnel)
            $table->string('contact')->nullable(); // Contact du visiteur (optionnel)
            $table->integer('score'); // Note donnée (par exemple, de 1 à 5)
            $table->text('comment'); // Commentaire/avis
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};