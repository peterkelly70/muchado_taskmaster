<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Task;
use App\Models\TaskList;
use App\Models\Status;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Status>
 */
class TaskOnListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'task_id' => Task::factory(),
            'task_list_id' => TaskList::factory(),
            'status_id' => Status::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
