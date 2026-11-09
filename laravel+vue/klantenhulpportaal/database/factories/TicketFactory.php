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
        $assignee = User::where('is_admin', true)->inRandomOrder()->firstOrFail();
        $creator  = User::whereKeyNot($assignee->id)->inRandomOrder()->firstOrFail();

        return [
            'title' => fake()->word(),
            'body' => fake()->paragraph(5),
            'status_id' => Status::inRandomOrder()->first()->id,
            'creator_id' => $creator->id,
            'assignee_id' => $assignee->id,
        ];
    }
}
