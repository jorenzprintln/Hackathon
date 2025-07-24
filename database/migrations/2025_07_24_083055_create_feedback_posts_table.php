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
        Schema::create('feedback_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('business_id')->constrained('business_profiles')->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->json('tags'); // ['cleanliness', 'accommodation', ...]
            $table->json('images')->nullable(); // Store image paths
            $table->enum('satisfaction', allowed: ['very_happy', 'happy', 'neutral', 'sad', 'disappointed']);
            $table->boolean('sentiment')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback_posts');
    }
};
