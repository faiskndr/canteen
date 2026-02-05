<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kartu extends BaseModel
{
    use HasFactory;

    protected $primaryKey = "kartu_id";
    protected $table = "kartu";

    protected $fillable = [
        'no_kartu',
        'pin',
        'saldo',
        'status',
        'siswa_id',
    ];

    public function siswaRelation()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'siswa_id');
    }
}
