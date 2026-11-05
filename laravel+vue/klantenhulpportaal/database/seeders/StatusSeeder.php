<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::factory()->create(['title' => 'In afwachting']);
        Status::factory()->create(['title' => 'In behandeling']);
        Status::factory()->create(['title' => 'Afgehandeld']);
    }
}
