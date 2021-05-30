<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatusOfTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\StatusOfTask::factory(6)->create();
    }
}
