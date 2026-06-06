<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DestinationCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Beaches & Coastal',
                'icon' => '🏖️',
                'image_url' => 'assets/image/beach.jpeg',
                'locations' => [
                    'East Coast' => ['Trincomalee', 'Nilaveli Beach', 'Uppuveli Beach', 'Pigeon Island National Park', 'Pasikuda', 'Kalkudah', 'Arugam Bay', 'Batticaloa'],
                    'South Coast' => ['Mirissa', 'Unawatuna', 'Hikkaduwa', 'Tangalle', 'Weligama', 'Matara', 'Dickwella', 'Hambantota'],
                    'West Coast' => ['Negombo', 'Kalutara', 'Bentota', 'Beruwala', 'Wadduwa', 'Mount Lavinia'],
                    'North Coast' => ['Jaffna', 'Casuarina Beach', 'Mannar']
                ]
            ],
            [
                'name' => 'Hill & Tea Country',
                'icon' => '🏔️',
                'image_url' => 'https://images.unsplash.com/photo-1555899434-94d1368aa7af?auto=format&fit=crop&w=800&q=80',
                'locations' => ['Ella', 'Nuwara Eliya', 'Haputale', 'Bandarawela', 'Hatton', 'Talawakelle', 'Maskeliya', 'Kandy']
            ],
            [
                'name' => 'Ancient Cities',
                'icon' => '🏛️',
                'image_url' => 'https://images.unsplash.com/photo-1588598126284-fcb4369a19fc?auto=format&fit=crop&w=800&q=80',
                'locations' => ['Anuradhapura', 'Polonnaruwa', 'Sigiriya', 'Pidurangala Rock', 'Dambulla Cave Temple', 'Yapahuwa', 'Mihintale']
            ],
            [
                'name' => 'Wildlife & Safari',
                'icon' => '🐘',
                'image_url' => 'https://images.unsplash.com/photo-1561731216-c3a4d99437d5?auto=format&fit=crop&w=800&q=80',
                'locations' => ['Yala National Park', 'Udawalawe National Park', 'Wilpattu National Park', 'Minneriya National Park', 'Kaudulla National Park', 'Bundala National Park', 'Kumana National Park']
            ],
            [
                'name' => 'Nature & Eco Tourism',
                'icon' => '🌿',
                'image_url' => 'https://images.unsplash.com/photo-1528659556858-450f3801f9ce?auto=format&fit=crop&w=800&q=80',
                'locations' => ['Sinharaja Forest Reserve', 'Horton Plains National Park', 'Knuckles Mountain Range', 'Riverston', 'Bambarakanda Falls', 'Dunhinda Falls', 'Rawana Falls']
            ],
            [
                'name' => 'Hiking & Adventure',
                'icon' => '⛰️',
                'image_url' => 'https://images.unsplash.com/photo-1582213796677-80252b45cbaf?auto=format&fit=crop&w=800&q=80',
                'locations' => ['Adam\'s Peak', 'Little Adam\'s Peak', 'Kitulgala', 'Lipton\'s Seat', 'Nine Arch Bridge']
            ],
            [
                'name' => 'Religious Tourism',
                'icon' => '🕌',
                'image_url' => 'https://images.unsplash.com/photo-1546708973-b339540b5162?auto=format&fit=crop&w=800&q=80',
                'locations' => ['Temple of the Tooth', 'Sri Maha Bodhi', 'Ruwanwelisaya', 'Nagadeepa Rajamaha Viharaya', 'Madhu Church', 'Koneswaram Temple']
            ],
            [
                'name' => 'Cities & Urban',
                'icon' => '🏙️',
                'image_url' => 'https://images.unsplash.com/photo-1582299863774-3c4be19bc704?auto=format&fit=crop&w=800&q=80',
                'locations' => ['Colombo', 'Kandy', 'Galle', 'Jaffna', 'Kurunegala', 'Badulla']
            ],
            [
                'name' => 'Islands',
                'icon' => '🏝️',
                'image_url' => 'https://images.unsplash.com/photo-1596815064285-45ed8a9c0463?auto=format&fit=crop&w=800&q=80',
                'locations' => ['Pigeon Island', 'Nainativu', 'Delft Island', 'Mannar Island']
            ],
        ];

        foreach ($categories as $catData) {
            $category = \App\Models\DestinationCategory::create([
                'name' => $catData['name'],
                'icon' => $catData['icon'],
                'image_url' => $catData['image_url'],
            ]);

            $isAssoc = array_keys($catData['locations']) !== range(0, count($catData['locations']) - 1);
            
            if ($isAssoc) {
                // Regions present
                foreach ($catData['locations'] as $region => $locations) {
                    foreach ($locations as $loc) {
                        $category->locations()->create([
                            'name' => $loc,
                            'region' => $region
                        ]);
                    }
                }
            } else {
                // Flat list
                foreach ($catData['locations'] as $loc) {
                    $category->locations()->create([
                        'name' => $loc,
                    ]);
                }
            }
        }
    }
}
