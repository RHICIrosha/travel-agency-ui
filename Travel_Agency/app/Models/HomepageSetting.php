<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageSetting extends Model
{
    protected $guarded = [];

    /**
     * Always return the single homepage settings record (or create defaults).
     */
    public static function getSettings(): self
    {
        return static::firstOrCreate(['id' => 1], [
            'hero_badge'                => "Sri Lanka's Most Trusted Travel Partner",
            'hero_heading_line1'        => 'Discover the',
            'hero_heading_highlight'    => 'Soul of',
            'hero_heading_line2'        => 'Sri Lanka',
            'hero_subtext'              => 'From misty mountains and ancient kingdoms to pristine beaches and thrilling wildlife safaris, Zenora Travels creates unforgettable journeys designed around your passion for exploration.',
            'hero_cta_primary_label'    => 'Plan Your Journey',
            'hero_cta_primary_url'      => '/contact',
            'hero_cta_secondary_label'  => 'Explore Tours',
            'hero_cta_secondary_url'    => '/tours',
            'hero_stat1_value'          => '1,300+',
            'hero_stat1_label'          => 'Happy Travellers',
            'hero_stat2_value'          => '4.9 / 5',
            'hero_stat2_label'          => 'Average Rating',
            'hero_stat3_value'          => '50+',
            'hero_stat3_label'          => 'Curated Routes',

            'about_badge'               => 'About Us',
            'about_heading_line1'       => 'Your Trusted',
            'about_heading_highlight'   => 'Travel Partner',
            'about_heading_line2'       => 'in Sri Lanka',
            'about_paragraph1'          => 'At Zenora Travels, we believe that travel is more than visiting destinations — it\'s about creating meaningful experiences and lifelong memories.',
            'about_paragraph2'          => 'Our team combines local expertise, personalized service, and a passion for adventure to showcase the very best of Sri Lanka.',
            'about_paragraph3'          => 'Every itinerary is thoughtfully designed to provide comfort, flexibility, and unforgettable moments.',
            'about_cta_primary_label'   => 'Plan with Us',
            'about_cta_primary_url'     => '/contact',
            'about_since_year'          => 'Since 2015',
            'about_experience_label'    => '10+ Years of Expert Guiding',

            'promise_badge'             => 'Our Promise',
            'promise_heading_line1'     => "We don't simply",
            'promise_heading_highlight' => 'organize tours.',
            'promise_text1'             => 'We create experiences that connect travelers with the beauty, culture, wildlife, and spirit of Sri Lanka.',
            'promise_text2'             => 'With Zenora Travels, every journey becomes a story worth telling.',
            'promise_pillar1_icon'      => '🌏',
            'promise_pillar1_title'     => 'Authentic',
            'promise_pillar1_desc'      => 'Real local connections',
            'promise_pillar2_icon'      => '💎',
            'promise_pillar2_title'     => 'Premium',
            'promise_pillar2_desc'      => 'International standard service',
            'promise_pillar3_icon'      => '🤝',
            'promise_pillar3_title'     => 'Responsible',
            'promise_pillar3_desc'      => 'Sustainable travel practices',
            'promise_cta_label'         => 'Start Your Journey',
            'promise_cta_url'           => '/contact',
        ]);
    }
}
