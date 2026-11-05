<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'User',
            'email' => 'user@example.com',
        ]);
        User::factory()->create([
            'name' => 'Admin',
            'is_admin' => true,
            'email' => 'admin@example.com',
        ]);

        User::factory()->count(3)->create(['is_admin' => true]);
        User::factory()->count(6)->create();
    }
}
