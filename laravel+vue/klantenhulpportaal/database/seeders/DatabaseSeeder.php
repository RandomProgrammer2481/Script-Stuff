<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            StatusSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            TicketSeeder::class,
            ReactionSeeder::class,
            NoteSeeder::class,
        ]);
    }
}
