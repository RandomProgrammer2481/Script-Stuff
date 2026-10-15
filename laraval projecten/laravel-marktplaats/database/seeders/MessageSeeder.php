<?php

namespace Database\Seeders;

use App\Models\Chat;
use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Chat::all()->each(function (Chat $chat) {
            Message::factory()
            ->count(fake()->numberBetween(2, 8))
            ->state(fn () => [
                'chat_id' => $chat->id,
                'user_id' => fake()->randomElement([$chat->user_1_id, $chat->user_2_id]),
            ])
            ->create();
        });
    }
}
