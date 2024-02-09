<?php

namespace Tests\Unit;

use App\Models\TaskList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskListTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_it_can_instantiate(): void
    {
        $this->assertTrue(true);
    }

    public function test_it_can_create_a_TaskList()
    {
        // Arrange
        $TaskList = TaskList::factory()->create();
        $TaskListData = [
            'name' => 'test list',
            'description' => 'A list, for tests test',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // Act
        $TaskList = TaskList::create($TaskListData);

        // Assert
        $this->assertDatabaseHas('task_list', $TaskListData);
    }

        /** @test */
        public function it_can_update_a_TaskList()
        {
            // Arrange
            $TaskList = TaskList::factory()->create();
            $updatedData = [
                'name' => 'updated test',
                'description' => 'This is a test',
                'created_at' => now(),
                'updated_at' => now(),
            ];
    
            // Act
            $TaskList->update($updatedData);
            $TaskList = $TaskList->refresh(); // Refresh the instance
    
            // Assert
            $this->assertDatabaseHas('task_list', $updatedData); // Check the 'TaskList' table
        }

        /** @test */
        public function it_can_delete_a_TaskList()
        {
            // Arrange
            $TaskList = TaskList::factory()->create();        
    
            // Act
            $TaskList->delete();
    
            // Assert
            $this->assertDatabaseMissing('task_list', ['id' => $TaskList->id]);
        }
    
        /** @test */
        public function it_can_retrieve_a_TaskList()
        {
            // Arrange
            $TaskList = TaskList::factory()->create();
    
            // Act
            $retrievedTaskList = TaskList::find($TaskList->id);
    
            // Assert
            $this->assertEquals($TaskList->id, $retrievedTaskList->id);
        }
}
