<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('featured_destinations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('tagline')->nullable();
            $table->string('image_url')->nullable();
            $table->string('badge_label')->default('Featured');
            $table->string('badge_color')->default('yellow'); // yellow | emerald | amber | blue
            $table->boolean('is_featured_large')->default(false); // true = large card
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('featured_destinations');
    }
};
