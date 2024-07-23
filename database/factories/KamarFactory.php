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
            'deskripsi' => "
            <p><strong>ROOM fake </strong> ini adalah kamar yang di-generate oleh factory.</p>
            <p>“On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying.</p>
            <p>In a free hour, when our power of choice is untrammeled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will.</p>
            ",
            'foto' => 'kamar.jpg',
        ];
    }
}
