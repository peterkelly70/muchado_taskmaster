<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserFeatureTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_register()
    {
        // Arrange
        $userData = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        // Act
        $response = $this->post(route('register'), $userData);

        // Assert
        $response->assertStatus(302); // Check for redirect
        $this->assertDatabaseHas('users', [
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]); // Check that the user was created in the database
    }

    /** @test */
    public function a_user_can_login()
    {
        // Arrange
        $user = User::factory()->create([
            'password' => bcrypt($password = 'password'),
        ]);

        // Act
        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => $password,
        ]);

        // Assert
        $response->assertStatus(302); // Check for redirect
        $response->assertRedirect(route('dashboard')); // Check for redirect to dashboard page
        $this->assertAuthenticatedAs($user); // Check that the user is authenticated
    }

    /** @test */
    public function a_user_can_logout()
    {
        // Arrange
        $user = User::factory()->create();

        // Act
        $response = $this->actingAs($user)->post(route('logout'));

        // Assert
        $response->assertRedirect('/'); // Check for redirect to main page
        $this->assertGuest(); // Check that the user is not authenticated
    }
}