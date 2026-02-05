<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Sekolah;
use App\Models\Siswa;
use App\Models\Kartu;
use App\Models\TopUp;
use App\Models\RiwayatSaldo;
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



        Sekolah::create([
            'nama' => 'pravda',
            'alamat' => 'rusia'
        ]);

        Sekolah::factory(20)->create();

        // User::factory()->create([
        //     'username' => 'admin',
        //     'user_group_id' => 2,
        //     'sekolah_id' => 1,
        // ]);

        User::factory()->create([
            'username' => 'superadmin',
            'user_group_id' => 1,
        ]);

        User::factory()->create([
            'username' => 'mail',
            'user_group_id' => 3,
        ]);

        Siswa::factory(20)
            ->has(Kartu::factory(), 'kartuRelation')
            ->has(TopUp::factory(), 'topUpRelations')
            ->create();

        $siswa = Siswa::with(['topUpRelations', 'kartuRelation'])->get();

        foreach ($siswa as $s) {
            foreach ($s->topUpRelations as $t) {
                RiwayatSaldo::factory()->create([
                    'kartu_id' => $s->kartuRelation->kartu_id,
                    'top_up_id' => $t->top_up_id
                ]);
            }
            
        }


        $user_group = ['super admin', 'admin', 'petugas top up', 'petugas kantin'];
        foreach($user_group as $u) {
            UserGroup::create([
                'nama' => $u
            ]);
        }
    }
}
