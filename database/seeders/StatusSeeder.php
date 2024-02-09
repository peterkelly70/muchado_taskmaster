<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;



class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed the "status" table with initial data
        DB::table('status')->insert([
            ['name' => 'Pending', 'color' => 'yellow'],
            ['name' => 'In Progress', 'color' => 'blue'],
            ['name' => 'Stalled', 'color' => 'red'],
            ['name' => 'Completed', 'color' => 'green'],
        ]);
    }
}
