<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('homepage_settings', function (Blueprint $table) {
            $table->id();

            // Hero Section
            $table->string('hero_badge')->default("Sri Lanka's Most Trusted Travel Partner");
            $table->string('hero_heading_line1')->default('Discover the');
            $table->string('hero_heading_highlight')->default('Soul of');
            $table->string('hero_heading_line2')->default('Sri Lanka');
            $table->text('hero_subtext')->nullable();
            $table->string('hero_cta_primary_label')->default('Plan Your Journey');
            $table->string('hero_cta_primary_url')->default('/contact');
            $table->string('hero_cta_secondary_label')->default('Explore Tours');
            $table->string('hero_cta_secondary_url')->default('/tours');
            $table->string('hero_stat1_value')->default('1,300+');
            $table->string('hero_stat1_label')->default('Happy Travellers');
            $table->string('hero_stat2_value')->default('4.9 / 5');
            $table->string('hero_stat2_label')->default('Average Rating');
            $table->string('hero_stat3_value')->default('50+');
            $table->string('hero_stat3_label')->default('Curated Routes');

            // About Section
            $table->string('about_badge')->default('About Us');
            $table->string('about_heading_line1')->default('Your Trusted');
            $table->string('about_heading_highlight')->default('Travel Partner');
            $table->string('about_heading_line2')->default('in Sri Lanka');
            $table->text('about_paragraph1')->nullable();
            $table->text('about_paragraph2')->nullable();
            $table->text('about_paragraph3')->nullable();
            $table->string('about_cta_primary_label')->default('Plan with Us');
            $table->string('about_cta_primary_url')->default('/contact');
            $table->string('about_since_year')->default('Since 2015');
            $table->string('about_experience_label')->default('10+ Years of Expert Guiding');

            // Our Promise Section
            $table->string('promise_badge')->default('Our Promise');
            $table->string('promise_heading_line1')->default("We don't simply");
            $table->string('promise_heading_highlight')->default('organize tours.');
            $table->text('promise_text1')->nullable();
            $table->text('promise_text2')->nullable();
            $table->string('promise_pillar1_icon')->default('🌏');
            $table->string('promise_pillar1_title')->default('Authentic');
            $table->string('promise_pillar1_desc')->default('Real local connections');
            $table->string('promise_pillar2_icon')->default('💎');
            $table->string('promise_pillar2_title')->default('Premium');
            $table->string('promise_pillar2_desc')->default('International standard service');
            $table->string('promise_pillar3_icon')->default('🤝');
            $table->string('promise_pillar3_title')->default('Responsible');
            $table->string('promise_pillar3_desc')->default('Sustainable travel practices');
            $table->string('promise_cta_label')->default('Start Your Journey');
            $table->string('promise_cta_url')->default('/contact');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('homepage_settings');
    }
};
