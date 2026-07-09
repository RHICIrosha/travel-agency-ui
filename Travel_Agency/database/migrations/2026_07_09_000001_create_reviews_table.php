<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('reviewer_name');
            $table->string('reviewer_email')->nullable();
            $table->string('tour_name')->nullable();
            $table->tinyInteger('rating')->default(5); // 1–5
            $table->string('mood_emoji')->nullable();   // e.g. 😍
            $table->text('review_text');
            $table->json('images')->nullable();          // array of stored paths
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
