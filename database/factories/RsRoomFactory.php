<?php

namespace Database\Factories;

use App\Models\Hospital;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RsRoom>
 */
class RsRoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $hospital = Hospital::inRandomOrder()->first(); // Get a random hospital

        $jumlah_kamar_terisi = fake()->numberBetween(0, $hospital->jumlah_kamar);
        $jumlah_kamar_kosong = $hospital->jumlah_kamar - $jumlah_kamar_terisi;

        $specializations = [
            'Cardiology',
            'Neurology',
            'Pediatrics',
            'Orthopedics',
            'Dermatology',
            'Oncology',
            'Gynecology',
            'Urology',
            'Gastroenterology',
            'Psychiatry',
            'Pulmonology'
        ];

        return [
            'hospital_id' => $hospital->id,
            'kelas_kamar' => fake()->randomElement(['kelas 1', 'kelas 2', 'kelas 3', 'VIP', 'VVIP']),
            'jumlah_kamar_terisi' => $jumlah_kamar_terisi,
            'jumlah_kamar_kosong' => $jumlah_kamar_kosong,
            'spesialisasi' => fake()->randomElement($specializations),
            'usia' => fake()->randomElement(['anak-anak', 'dewasa']),
        ];
    }
}
