<?php

namespace Database\Factories;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Leave>
 */
class LeaveFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'leave_type' => $this->faker->word, // Add leave type
            'start_date' => $this->faker->date, // Add start date
            'end_date' => $this->faker->date, // Add end date
            'is_active' => $this->faker->boolean, // Add is active
        ];
    }
}
