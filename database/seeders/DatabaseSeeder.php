<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Create admin user
        Admin::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@smartbazaar.com',
            'password' => bcrypt('admin1234'),
            'role_id' => Admin::ADMIN,
            'is_active' => true,
        ]);

        // Create admin user (as requested)
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@smartbazaar.com',
            'phone_number' => '01700000000',
            'password' => bcrypt('admin1234'),
        ]);
    }
}
