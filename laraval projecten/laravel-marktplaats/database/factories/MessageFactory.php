<?php

namespace Database\Factories;

use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'body' => $this->faker->paragraph(3),
            'advertisement_id' => null,
            'sender_id' => User::inRandomOrder()->first()->id,
            'receiver_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
