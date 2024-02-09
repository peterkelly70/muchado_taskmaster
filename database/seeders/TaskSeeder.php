<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed the "task" table with adventure-themed task data
        DB::table('task')->insert([
            ['title' => 'Defend the Castle Walls', 'description' => 'Protect the castle walls from invading goblins'],
            ['title' => 'Follow the Goblin Tracks', 'description' => 'Track the goblins through the forest'],
            ['title' => 'Explore the Mysterious Caves', 'description' => 'Delve deep into the caves for hidden treasures'],
            ['title' => 'Slay the Goblin King', 'description' => 'Defeat the Goblin King in the heart of the cave'],
            ['title' => 'Rescue the Princess', 'description' => 'Save the princess held captive in the goblin stronghold'],
        ]);
    }
}

