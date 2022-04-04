<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ToDoList>
 */
class ToDoListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "list_title" => $this->faker->title,
            "description" => $this->faker->realText(),
            "user_id" => User::all()->random()->id
        ];
    }
}
