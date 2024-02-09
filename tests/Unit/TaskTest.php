<?php

namespace Tests\Unit;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_instantiate(): void
    {
        $this->assertTrue(true);
    }

    public function test_it_can_create_a_task()
    {
        // Arrange
        $taskData = [
            'title' => 'test',
            'description' => 'This is a test',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // Act
        $task = Task::create($taskData);

        // Assert
        $this->assertDatabaseHas('task', $taskData);
    }

        /** @test */
        public function it_can_update_a_task()
        {
            // Arrange
            $task = task::factory()->create();
            $updatedData = [
                'title' => 'updated test',
                'description' => 'This is a test',
                'created_at' => now(),
                'updated_at' => now(),
            ];
    
            // Act
            $task->update($updatedData);
            $task = $task->refresh(); // Refresh the instance
    
            // Assert
            $this->assertDatabaseHas('task', $updatedData); // Check the 'task' table
        }

        /** @test */
        public function it_can_delete_a_task()
        {
            // Arrange
            $task = task::factory()->create();        
    
            // Act
            $task->delete();
    
            // Assert
            $this->assertDatabaseMissing('task', ['id' => $task->id]);
        }
    
        /** @test */
        public function it_can_retrieve_a_task()
        {
            // Arrange
            $task = task::factory()->create();
    
            // Act
            $retrievedtask = task::find($task->id);
    
            // Assert
            $this->assertEquals($task->id, $retrievedtask->id);
        }
}