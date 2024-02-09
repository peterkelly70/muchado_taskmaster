<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    public function test_it_can_create_a_user()
    {
        // Arrange
        $userData = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ];
    
        // Act
        $user = User::create($userData);
    
        // Assert
        $this->assertDatabaseHas('users', ['email' => 'test@example.com']);
    }
    
    /** @test */
    public function test_it_can_read_a_user()
    {
        // Arrange
        $user = User::factory()->create();
    
        // Act
        $foundUser = User::find($user->id);
    
        // Assert
        $this->assertEquals($user->email, $foundUser->email);
    }
    
    /** @test */
    public function test_it_can_update_a_user()
    {
        // Arrange
        $user = User::factory()->create();
    
        // Act
        $user->update(['name' => 'Updated Name']);
    
        // Assert
        $this->assertEquals('Updated Name', $user->fresh()->name);
    }
    
    /** @test */
    public function test_it_can_delete_a_user()
    {
        // Arrange
        $user = User::factory()->create();
    
        // Act
        $user->delete();
    
        // Assert
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }
    
}