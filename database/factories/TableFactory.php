<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Table>
 */
class TableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'table_id' => 1,
            'section_id' => 1,
            'combined' => false,
            'comments' => fake()->sentence(),
            'chairs' => 2,
            'status_id' => 1,
        ];
    }
}
