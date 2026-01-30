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
}
