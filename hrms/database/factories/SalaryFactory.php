<?php

namespace Database\Factories;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Salary>
 */
class SalaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'salary_amount' => $this->faker->randomFloat(2, 3000, 10000), // Adjust the range as needed
            'released_date' => $this->faker->date,
            'mode_of_payment' => $this->faker->randomElement(['Direct Deposit', 'Check', 'Other']),
            
        ];
    }
}
