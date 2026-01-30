<?php

namespace App\Models;

use App\Models\BaseModel;

class Sekolah extends BaseModel
{
    protected $primaryKey = "sekolah_id";
    protected $table = "sekolah";

    public const CREATED_AT = 'dibuat_pada';
    public const UPDATED_AT = 'diubah_pada';
}
