<?php

namespace Database\Factories;

use App\Models\AssigneeTask;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssigneeTaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AssigneeTask::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'department_id' => $this->faker->numberBetween(1, 10),
            'user_id' => $this->faker->numberBetween(1, 10),
            'project_id' => $this->faker->numberBetween(1, 3),
            'status_id' => $this->faker->numberBetween(1, 4),
            'priority_id' => $this->faker->numberBetween(1, 3),
            'top' => $this->faker->numberBetween(5, 200)."px",
            'left' => $this->faker->numberBetween(5, 200)."px",
            'name' => $this->faker->name,
            'date' => $this->faker->date,
        ];
    }
}
