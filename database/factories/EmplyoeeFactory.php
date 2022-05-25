<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class EmplyoeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->unique()->phoneNumber(),
            'job_positon' => $this->faker->jobTitle(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'salary' => $this->faker->randomFloat(2, 0, 1000000),
            'hire_date' => $this->faker->dateTimeBetween('-5 years', 'now'),
            'birthday' => $this->faker->dateTimeBetween('-20 years', 'now'),
            'created_user' => 1,
            'updated_user' => 1,
        ];
    }
}
