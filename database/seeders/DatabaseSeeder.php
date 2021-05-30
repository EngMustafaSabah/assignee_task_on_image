<?php

namespace Database\Seeders;

use App\Models\StatusOfTask;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            DepartmentSeeder::class,
            UserSeeder::class,
            StatusOfTaskSeeder::class,
            PriorityOfTaskSeeder::class,
            ProjectSeeder::class,
            AssigneeTaskSeeder::class,
        ]);
    }
}
