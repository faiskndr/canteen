<?php

namespace App\Models;

use App\Models\BaseModel;

class Siswa extends BaseModel
{
    protected $primaryKey = 'siswa_id';
    protected $table = 'siswa';

    protected $fillable = [
        'nis',
        'nama',
        'kelas',
        'foto',
        'sekolah_id',
    ];

    public function kartuRelation()
    {
        return $this->hasOne(Kartu::class, 'siswa_id', 'siswa_id')->where('status', 'aktif');
    }
}
