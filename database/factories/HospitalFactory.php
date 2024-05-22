<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hospital>
 */
class HospitalFactory extends Factory
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
            'nama_rumah_sakit' => fake()->company,
            'alamat_rumah_sakit' => fake()->address,
            'jumlah_kamar' => fake()->numberBetween(50, 200),
            'alamat_email' => fake()->unique()->safeEmail,
            'password' => bcrypt('password'),
        ];
    }
}
