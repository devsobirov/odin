<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            [
                'name' => 'Project 1',
                'login' => 'project_1',
                'password' => Hash::make('secret'),
                'created_at' => now()
            ],
            [
                'name' => 'Project 2',
                'login' => 'project_2',
                'password' => Hash::make('secret'),
                'created_at' => now()
            ]
        ]);
    }
}
