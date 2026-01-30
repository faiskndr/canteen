<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public const CREATED_AT = 'dibuat_pada';
    public const UPDATED_AT = 'diubah_pada';
}