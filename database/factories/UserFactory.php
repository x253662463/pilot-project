<?php

namespace Database\Factories;

use App\Http\Services\UserService;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $service = new UserService();
        return [
            'username' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => $service->passwordHash('test123'),
            'group_id' => \App\Models\UserGroup::inRandomOrder()->first()->id,
        ];
    }
}
