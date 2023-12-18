<?php

namespace Database\Factories;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'department' => $this->faker->word,
            'schedule' => rand(7,12).'-'.rand(1,5).'/'.Arr::random(['MWF','TTHS']),
            'is_active_flag' => rand(1,0),
        ];
    }
}
