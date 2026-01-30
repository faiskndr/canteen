<?php

namespace App\Models;

use App\Models\BaseModel;

class Kantin extends BaseModel
{
    protected $primaryKey = "kantin_id";
    protected $table = "kantin";

    protected $fillable = [
        'nama',
        'lokasi',
        'sekolah_id'
    ];
}
