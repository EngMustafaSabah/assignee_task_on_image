<?php

namespace Database\Factories;

use App\Models\StatusOfTask;
use Illuminate\Database\Eloquent\Factories\Factory;

class StatusOfTaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StatusOfTask::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = [
            'open' => 'Brown',
            'in progress' => 'Black',
            'in Resolved' => 'Blue',
            'Cloced' => 'Green',
            'rejected' => 'Red',
            'feedback' => 'Yellow',
        ];
        





        return [
            'name' => array_keys($status)[rand(0,5)],
            'color' => array_values($status)[rand(0,5)],
        ];
    }
}
