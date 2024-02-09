<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\TaskList;
use App\Models\UserHasList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserHasListTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_create_user_has_list(): void
    {
        $user = User::factory()->create();
        $taskList = TaskList::factory()->create();

        $userHasList = UserHasList::create([
            'user_id' => $user->id,
            'task_list_id' => $taskList->id,
        ]);

        $this->assertDatabaseHas('user_has_list', [
            'user_id' => $user->id,
            'task_list_id' => $taskList->id,
        ]);
    }

    public function test_it_can_retrieve_user_has_list(): void
    {
        $userHasList = UserHasList::factory()->create();

        $foundUserHasList = UserHasList::find($userHasList->id);

        $this->assertNotNull($foundUserHasList);
        $this->assertEquals($userHasList->id, $foundUserHasList->id);
    }

    public function test_it_can_update_user_has_list(): void
    {
        $userHasList = UserHasList::factory()->create();
        $newTaskList = TaskList::factory()->create();

        $userHasList->update(['task_list_id' => $newTaskList->id]);

        $this->assertDatabaseHas('user_has_list', [
            'user_id' => $userHasList->user_id,
            'task_list_id' => $newTaskList->id,
        ]);
    }

    public function test_it_can_delete_user_has_list(): void
    {
        $userHasList = UserHasList::factory()->create();

        $userHasList->delete();

        $this->assertDatabaseMissing('user_has_list', [
            'id' => $userHasList->id,
        ]);
    }
}