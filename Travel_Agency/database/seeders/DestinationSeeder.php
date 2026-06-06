<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $destinations = [
            ['name' => 'Sigiriya', 'description' => 'Ancient Citadel', 'image_url' => 'https://images.unsplash.com/photo-1586861635167-e5223aadc9fe?auto=format&fit=crop&w=600&q=80'],
            ['name' => 'Ella', 'description' => 'Hill Country', 'image_url' => 'https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=600&q=80'],
            ['name' => 'Nuwara Eliya', 'description' => 'Little England', 'image_url' => 'https://images.unsplash.com/photo-1555899434-94d1368aa7af?auto=format&fit=crop&w=600&q=80'],
            ['name' => 'Kandy', 'description' => 'Cultural Capital', 'image_url' => 'https://images.unsplash.com/photo-1546708973-b339540b5162?auto=format&fit=crop&w=600&q=80'],
            ['name' => 'Mirissa', 'description' => 'Whales & Surf', 'image_url' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=600&q=80'],
            ['name' => 'Trincomalee', 'description' => 'East Coast', 'image_url' => 'https://images.unsplash.com/photo-1596815064285-45ed8a9c0463?auto=format&fit=crop&w=600&q=80'],
            ['name' => 'Arugam Bay', 'description' => 'Surfing Haven', 'image_url' => 'https://images.unsplash.com/photo-1502680390469-be75c86b636f?auto=format&fit=crop&w=600&q=80'],
            ['name' => 'Yala Park', 'description' => 'Leopard Safari', 'image_url' => 'https://images.unsplash.com/photo-1561731216-c3a4d99437d5?auto=format&fit=crop&w=600&q=80'],
            ['name' => 'Galle', 'description' => 'Historic Fort', 'image_url' => 'https://images.unsplash.com/photo-1552465011-b4e21bf6e79a?auto=format&fit=crop&w=600&q=80'],
            ['name' => 'Bentota', 'description' => 'Water Sports', 'image_url' => 'https://images.unsplash.com/photo-1588714477688-61d0f50c0c00?auto=format&fit=crop&w=600&q=80'],
        ];

        foreach ($destinations as $dest) {
            \App\Models\Destination::create($dest);
        }
    }
}
