<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class KartuFactory extends Factory
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
            'no_kartu' => random_int(1000000000, 9999999999),
            'pin' => '1234',
            'saldo' => 10000,
            'status' => 'aktif',
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
