<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class SiswaFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $kelas = ['XII AKL', 'XII RPL', 'XII AP', 'XII OTKP', 'XII TM', 'XII TKJ', 'XII PM', 'XII FS'];
        return [
            'nis' => random_int(17610, 17999),
            'nama' => fake()->name(),
            'kelas' => $kelas[rand(0, 7)],
            'sekolah_id' => rand(1, 20),
            'foto' => 'default.png'
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    // public function unverified(): static
    // {
    //     return $this->state(fn (array $attributes) => [
    //         'email_verified_at' => null,
    //     ]);
    // }
}
