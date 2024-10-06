<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ulasan>
 */
class UlasanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kamar_id' => $this->faker->numberBetween(1, 10),
            'pelanggan_id' => $this->faker->numberBetween(1, 10),
            'rating' => $this->faker->numberBetween(1, 5),
        ];
    }
}
