<?php

namespace Database\Factories;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

use function Laravel\Prompts\error;

/**
 * @extends Factory<Chat>
 */
class ChatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::inRandomOrder()->limit(2)->pluck('id');

        [$user_1, $user_2] = $users;

        return [
            'user_1_id' => $user_1,
            'user_2_id' => $user_2,
        ];
    }
}
