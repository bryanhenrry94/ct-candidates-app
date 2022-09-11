<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'description' => $this->faker->text(100),
            'state' => false,
            'order' => 1,
            'user_id' => rand(1, 4),
        ];
    }
}
