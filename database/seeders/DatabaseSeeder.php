<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Sekolah;
use App\Models\UserGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'user_group_id' => 2
        ]);

        Sekolah::create([
            'nama' => 'pravda',
            'alamat' => 'rusia'
        ]);

        $user_group = ['super admin', 'admin', 'petugas top up', 'petugas kantin'];
        foreach($user_group as $u) {
            UserGroup::create([
                'nama' => $u
            ]);
        }
    }
}
