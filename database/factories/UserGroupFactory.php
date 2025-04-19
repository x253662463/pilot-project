<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserGroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'level' => $this->faker->numberBetween(1, 10),
        ];
    }
}
