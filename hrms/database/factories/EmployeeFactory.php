<?php

namespace Database\Factories;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'age' => rand(18, 65),
            'address' => $this->faker->city,
            'birthday' => $this->faker->date,
            'department' => $this->faker->word,
            'email' => $this->faker->email,
            'contact_number' => $this->faker->phoneNumber,
            'date_hired' => $this->faker->date,
            'gender' => $this->faker->randomElement(['male', 'female']),
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
