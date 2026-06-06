<?php
use App\Models\User;

$user = User::where('email', 'admin@example.com')->first();
if (!$user) {
    User::create([
        'name' => 'Admin',
        'email' => 'admin@example.com',
        'password' => bcrypt('password'),
    ]);
    echo "Admin created successfully.\n";
} else {
    echo "Admin already exists.\n";
}
