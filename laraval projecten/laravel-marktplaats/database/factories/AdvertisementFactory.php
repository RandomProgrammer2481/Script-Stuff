<?php

namespace Database\Factories;

use App\Models\Advertisement;
use App\Models\Category;
use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Advertisement>
 */
class AdvertisementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 0.01, 10000),
            'category_id' => Category::inRandomOrder()->first()->id,
            'is_promoted' => false,
            'promoted_at' => null,
        ];
    }

    public function promoted(): static
    {
        return $this->state(fn () => [
            'is_promoted' => true,
            'promoted_at' => now(),
        ]);
    }
}
