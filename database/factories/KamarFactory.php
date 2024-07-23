<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kamar>
 */
class KamarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tipe_id' => $this->faker->numberBetween(1, 4),
            // 'nomor_kamar' => $this->faker->unique()->randomNumber(3),
            'kapasitas' => $this->faker->numberBetween(2, 5),
            'harga' => $this->faker->numberBetween(100000, 500000),
            'deskripsi' => $this->faker->text(),
            'foto' => 'kamar.jpg',
        ];
    }
}
