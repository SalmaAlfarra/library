<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' => $this->faker->word(),
            'description' => $this->faker->paragraph(1,true),
            'year' => $this->faker->year(2023),
            'price' => $this->faker->randomFloat(2,15.00,200.00),
            'quntity' => $this->faker->numberBetween(1,500),
            'active' => $this->faker->boolean(50),
        ];
    }
}
?>