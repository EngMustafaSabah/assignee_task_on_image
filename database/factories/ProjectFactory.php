<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {        
        $images = [
            '2D_Basic_Floor_Plan-1024x695.jpg',
            'Image.jpeg'
        ];

        return [
            'name' => $this->faker->name,
            'image' => $images[$this->faker->numberBetween(0,1)],
            'user_id' => $this->faker->numberBetween(1,10),
        ];
    }
}
