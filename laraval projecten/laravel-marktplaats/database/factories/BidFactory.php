<?php

namespace Database\Factories;

use App\Models\Advertisement;
use App\Models\Bid;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Bid>
 */
class BidFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'amount' => $this->faker->randomFloat(2, 0.10, 10000),
            'user_id' => User::inRandomOrder()->first()->id,
            'advertisement_id' => Advertisement::inRandomOrder()->first()->id,
        ];
    }
}
