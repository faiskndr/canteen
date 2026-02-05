<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends BaseModel
{
    use HasFactory;

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

    public function topUpRelations()
    {
        return $this->hasMany(TopUp::class, 'siswa_id', 'siswa_id');
    }
}
