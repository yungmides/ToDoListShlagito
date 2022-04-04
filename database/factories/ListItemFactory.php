<?php

namespace Database\Factories;

use App\Models\ToDoList;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ListItem>
 */
class ListItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "item_name" => $this->faker->name,
            "item_content" => $this->faker->realText,
            "done" => $this->faker->boolean,
            "to_do_list_id" => ToDoList::all()->random()->id
        ];
    }
}
