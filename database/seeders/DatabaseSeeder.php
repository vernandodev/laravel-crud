<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Edulevel;
use App\Models\Program;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Edulevel::factory(5)->create();
        Program::factory(5)->create();
    }
}
