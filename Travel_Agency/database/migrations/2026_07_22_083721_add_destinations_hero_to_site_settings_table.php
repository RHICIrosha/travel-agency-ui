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
        Schema::table('site_settings', function (Blueprint $table) {
            $table->string('destinations_hero_subtitle')->default('Discover The Pearl')->after('footer_about_text');
            $table->string('destinations_hero_title')->default('Explore Sri Lanka')->after('destinations_hero_subtitle');
            $table->string('destinations_hero_image')->nullable()->after('destinations_hero_title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn(['destinations_hero_subtitle', 'destinations_hero_title', 'destinations_hero_image']);
        });
    }
};
