<?php

namespace Tests\Unit;

use App\Models\Status;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StatusTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_instaniate(): void
    {
        $this->assertTrue(true);
    }


    /** @test */
    public function it_can_create_a_status()
    {
        // Arrange
        $statusData = ['name' => 'status', 'color' => 'green'];

        // Act
        $status = Status::create($statusData);

        // Assert
        $this->assertDatabaseHas('status', $statusData);
    }

    /** @test */
    public function it_can_update_a_status()
    {
        // Arrange
        $status = Status::factory()->create();
        $updatedData = ['name' => 'updated status', 'color' => 'blue'];

        // Act
        $status->update($updatedData);
        $status = $status->refresh(); // Refresh the instance

        // Assert
        $this->assertDatabaseHas('status', $updatedData); // Check the 'status' table
    }
    /** @test */
    public function it_can_delete_a_status()
    {
        // Arrange
        $status = Status::factory()->create();        

        // Act
        $status->delete();

        // Assert
        $this->assertDatabaseMissing('status', ['id' => $status->id]);
    }

    /** @test */
    public function it_can_retrieve_a_status()
    {
        // Arrange
        $status = Status::factory()->create();

        // Act
        $retrievedStatus = Status::find($status->id);

        // Assert
        $this->assertEquals($status->id, $retrievedStatus->id);
    }
}