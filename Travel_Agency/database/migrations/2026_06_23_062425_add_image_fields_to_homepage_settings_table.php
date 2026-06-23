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
        Schema::table('homepage_settings', function (Blueprint $table) {
            $table->string('hero_image_1')->nullable();
            $table->string('hero_image_2')->nullable();
            $table->string('hero_image_3')->nullable();
            
            $table->string('about_image_1')->nullable();
            $table->string('about_image_2')->nullable();
            $table->string('about_image_3')->nullable();
            
            $table->string('promise_bg_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('homepage_settings', function (Blueprint $table) {
            $table->dropColumn([
                'hero_image_1', 'hero_image_2', 'hero_image_3',
                'about_image_1', 'about_image_2', 'about_image_3',
                'promise_bg_image'
            ]);
        });
    }
};
