<?php

namespace Database\Factories;

use App\Models\Status;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $creator_id = User::inRandomOrder()->first()->id;
        $assignee_id = User::inRandomOrder()->first()->id;

        while ($assignee_id === $creator_id) {
            $assignee_id = User::inRandomOrder()->first()->id;
        }

        return [
            'title' => fake()->word(),
            'body' => fake()->paragraph(5),
            'status_id' => Status::inRandomOrder()->first()->id,
            'creator_id' => $creator_id,
            'assignee_id' => $assignee_id
        ];
    }
}
