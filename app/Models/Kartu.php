<?php

namespace App\Models;

class Kartu extends BaseModel
{
    protected $primaryKey = "kartu_id";
    protected $table = "kartu";

    protected $fillable = [
        'no_kartu',
        'pin',
        'saldo',
        'status',
        'siswa_id',
    ];
}
