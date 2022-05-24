<?php

namespace Database\Factories;

use App\Models\Edulevel;
use Faker\Provider\ar_EG\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Program>
 */
class ProgramFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'edulevel_id' => rand(1, Edulevel::all()->count()),
            'name' => $this->faker->Company(),
            'student_price' => $this->faker->numerify(),
            'student_max' => $this->faker->randomDigit(),
            'info' => $this->faker->paragraph(),
        ];
    }
}
