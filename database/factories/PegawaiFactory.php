<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pegawai>
 */
class PegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'jenis_kelamin' => $this->faker->randomElement(['L', 'P']),
            'no_telp' => $this->faker->phoneNumber(),
            'Jabatan' => $this->faker->randomElement(['Receptionist', 'Housekeeping', 'Security']),
            'alamat' => $this->faker->address(),
            'tanggal_lahir' => $this->faker->date(),
            'status' => 'aktif',
            'user_id' => $this->faker->numberBetween(11, 20),
        ];
    }
}
