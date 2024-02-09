<?php

namespace Tests\Unit;

use App\Models\TaskOnList;
use App\Models\Task;
use App\Models\TaskList;
use App\Models\Status;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskOnListTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_instantiate(): void
    {
        $this->assertTrue(true);
    }

    public function test_it_can_create_a_task_on_list()
    {
        // Arrange
        $task = Task::factory()->create();
        $tasklist = TaskList::factory()->create();
        $status = Status::factory()->create();
        $taskonlistData = [
            'task_id' => $task->id,
            'task_list_id' => $tasklist->id,
            'status_id' => $status->id, 
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // Act
        $taskonlist = TaskOnList::create($taskonlistData);

        // Assert
        $this->assertDatabaseHas('task_on_list', $taskonlistData);
    }

      /** @test */
      public function it_can_retrieve_a_task_list()
      {
          // Arrange
          $taskonlist = TaskOnList::factory()->create();
  
          // Act
          $retrievedtask = TaskOnList::find($taskonlist->id);
  
          // Assert
          $this->assertEquals($taskonlist->id, $retrievedtask->id);
      }

        /** @test */
        public function it_can_update_a_task_on_list()
        {
            // Arrange
            $taskonlist = TaskOnList::factory()->create();
            $task = Task::factory()->create();
            $tasklist = TaskList::factory()->create();
            $status = Status::factory()->create();
            $updatedData = [
                'task_id' => $task->id,
                'task_list_id' => $tasklist->id,
                'status_id' => $status->id, 
                'created_at' => now(),
                'updated_at' => now(),
            ];
    
            // Act
            $taskonlist->update($updatedData);
            $taskonlist = $taskonlist->refresh(); // Refresh the instance
    
            // Assert
            $this->assertDatabaseHas('task_on_list', $updatedData); // Check the 'task_on_list' table
        }

        /** @test */
        public function it_can_delete_a_task()
        {
            // Arrange
            $taskonlist = TaskOnList::factory()->create();        
    
            // Act
            $taskonlist->delete();
    
            // Assert
            $this->assertDatabaseMissing('task_on_list', ['id' => $taskonlist->id]);
        }
    
      
}