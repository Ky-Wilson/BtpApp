<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->decimal('price', 15, 2);
            $table->string('status')->default('à vendre');
            $table->boolean('is_approved')->default(false);
            $table->string('location')->nullable();
            
            // Caractéristiques
            $table->string('surface')->nullable();
            $table->integer('nombre_de_pieces')->nullable();
            $table->string('equipements')->nullable();
            
            // Fichiers
            $table->json('images')->nullable();
            $table->json('videos')->nullable();
            $table->json('documents')->nullable();
            
            // Contact
            $table->string('whatsapp_link')->nullable();
            $table->string('phone_number')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};