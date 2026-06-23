<?php

namespace Database\Seeders;

use App\Models\HomepageSetting;
use App\Models\WhyUsItem;
use App\Models\HomeService;
use App\Models\FeaturedDestination;
use Illuminate\Database\Seeder;

class HomepageSeeder extends Seeder
{
    public function run(): void
    {
        // ── Homepage Settings (singleton) ──────────────────────────
        HomepageSetting::getSettings();

        // ── Why Choose Us Items ────────────────────────────────────
        if (WhyUsItem::count() === 0) {
            $whyUsItems = [
                ['icon' => '🏡', 'title' => 'Local Expertise',          'description' => 'Discover hidden gems and authentic experiences guided by people who truly know Sri Lanka.',      'sort_order' => 1],
                ['icon' => '✨', 'title' => 'Tailor-Made Experiences',   'description' => 'Every journey is customized to suit your interests, travel style, and budget.',                  'sort_order' => 2],
                ['icon' => '🛡️', 'title' => 'Reliable Service',          'description' => 'Professional planning, comfortable transportation, and dedicated support throughout your trip.', 'sort_order' => 3],
                ['icon' => '🌿', 'title' => 'Sustainable Tourism',       'description' => 'We promote responsible travel that respects local communities, wildlife, and the environment.',   'sort_order' => 4],
                ['icon' => '📞', 'title' => '24/7 Assistance',           'description' => 'Travel with confidence knowing our team is always ready to assist you.',                         'sort_order' => 5],
            ];
            foreach ($whyUsItems as $item) {
                WhyUsItem::create(array_merge($item, ['is_active' => true]));
            }
        }

        // ── Home Services ──────────────────────────────────────────
        if (HomeService::count() === 0) {
            $services = [
                ['icon' => '🐆', 'title' => 'Wildlife Safaris',        'description' => "Experience Sri Lanka's incredible wildlife, including leopards, elephants, sloth bears, and exotic birdlife.", 'image_url' => 'https://images.unsplash.com/photo-1612099453261-b04df0e4c44a?auto=format&fit=crop&w=1200&q=80', 'sort_order' => 1],
                ['icon' => '🏛️', 'title' => 'Cultural Journeys',       'description' => 'Explore ancient cities, sacred temples, UNESCO heritage sites, and centuries of fascinating history.',         'image_url' => 'https://images.unsplash.com/photo-1519608487953-e999c86e7455?auto=format&fit=crop&w=1200&q=80', 'sort_order' => 2],
                ['icon' => '🏖️', 'title' => 'Beach Holidays',           'description' => 'Relax along golden coastlines, enjoy tropical sunsets, and experience island paradise.',                       'image_url' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1200&q=80', 'sort_order' => 3],
                ['icon' => '🧗', 'title' => 'Adventure Experiences',   'description' => 'Hiking, trekking, camping, whale watching, and thrilling outdoor activities across Sri Lanka.',               'image_url' => 'https://images.unsplash.com/photo-1551632436-cbf8dd35adfa?auto=format&fit=crop&w=1200&q=80', 'sort_order' => 4],
                ['icon' => '🚗', 'title' => 'Private Tours',            'description' => 'Enjoy personalized itineraries with flexible schedules and dedicated guides just for you.',                     'image_url' => 'https://images.unsplash.com/photo-1524492412937-b28074a5d7da?auto=format&fit=crop&w=1200&q=80', 'sort_order' => 5],
                ['icon' => '✈️', 'title' => 'Airport Transfers',        'description' => 'Comfortable and reliable transportation from arrival to departure, hassle-free.',                               'image_url' => 'https://images.unsplash.com/photo-1436491865332-7a61a109cc05?auto=format&fit=crop&w=1200&q=80', 'sort_order' => 6],
            ];
            foreach ($services as $service) {
                HomeService::create(array_merge($service, ['is_active' => true]));
            }
        }

        // ── Featured Destinations ──────────────────────────────────
        if (FeaturedDestination::count() === 0) {
            $destinations = [
                ['name' => 'Yala National Park', 'tagline' => "Witness Sri Lanka's famous leopards in their natural habitat.",  'image_url' => 'https://images.unsplash.com/photo-1543877401-fd9e2a9a8a89?auto=format&fit=crop&w=1400&q=80', 'badge_label' => 'Wildlife',    'badge_color' => 'yellow',  'is_featured_large' => true,  'sort_order' => 1],
                ['name' => 'Ella',               'tagline' => 'Breathtaking mountain landscapes, waterfalls & scenic train journeys.', 'image_url' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1200&q=80', 'badge_label' => 'Hill Country', 'badge_color' => 'emerald', 'is_featured_large' => false, 'sort_order' => 2],
                ['name' => 'Sigiriya',           'tagline' => 'Climb the iconic Lion Rock and uncover ancient royal history.',       'image_url' => 'https://images.unsplash.com/photo-1588416936097-41850ab3d86d?auto=format&fit=crop&w=1200&q=80', 'badge_label' => 'Heritage',  'badge_color' => 'amber',   'is_featured_large' => false, 'sort_order' => 3],
                ['name' => 'Mirissa',            'tagline' => 'Whale watching, tropical beaches, and unforgettable sunsets.',        'image_url' => 'https://images.unsplash.com/photo-1562979314-bee7453e911c?auto=format&fit=crop&w=800&q=80',  'badge_label' => 'Beach',     'badge_color' => 'yellow',  'is_featured_large' => false, 'sort_order' => 4],
                ['name' => 'Kandy',              'tagline' => "Experience Sri Lanka's cultural capital and sacred traditions.",      'image_url' => 'https://images.unsplash.com/photo-1567086963156-02048697d9b2?auto=format&fit=crop&w=800&q=80', 'badge_label' => 'Culture',   'badge_color' => 'emerald', 'is_featured_large' => false, 'sort_order' => 5],
                ['name' => 'Nuwara Eliya',       'tagline' => 'Explore rolling tea plantations and cool mountain scenery.',          'image_url' => 'https://images.unsplash.com/photo-1518548419970-58e3b4079ab2?auto=format&fit=crop&w=800&q=80', 'badge_label' => 'Tea Country','badge_color' => 'emerald', 'is_featured_large' => false, 'sort_order' => 6],
            ];
            foreach ($destinations as $dest) {
                FeaturedDestination::create(array_merge($dest, ['is_active' => true]));
            }
        }
    }
}
