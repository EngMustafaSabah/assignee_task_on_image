<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AssigneeTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\AssigneeTask::factory(5)->create();
    }
}
