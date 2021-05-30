<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PriorityOfTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\PriorityOfTask::factory(3)->create();
    }
}
