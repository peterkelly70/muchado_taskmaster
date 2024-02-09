<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\TaskList; 

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserHasList>
 */
class UserHasListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'user_id' => \App\Models\User::factory(),
        'task_list_id' => \App\Models\TaskList::factory(),
        'created_at' => now(),
        'updated_at' => now(),
        ];
    }
}
