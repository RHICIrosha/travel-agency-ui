<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $guarded = [];

    /**
     * Always return the single site settings record (or create defaults).
     */
    public static function getSettings(): self
    {
        return static::firstOrCreate(['id' => 1], [
            'contact_phone' => '+94 77 123 4567',
            'contact_email' => 'hello@zenoratravels.com',
            'contact_address' => "123 Paradise Avenue,\nColombo 03,\nSri Lanka",
            'footer_about_text' => "We create meaningful experiences and lifelong memories across Sri Lanka. Local expertise, personalized service, and a passion for adventure — that's Zenora Travels.",
            'social_facebook' => '#',
            'social_twitter' => '#',
            'social_instagram' => '#',
            'social_linkedin' => '#',
            'social_whatsapp' => '#',
            'social_youtube' => '#',
        ]);
    }
}
