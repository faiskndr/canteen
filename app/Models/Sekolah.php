<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sekolah extends BaseModel
{
    use HasFactory;

    protected $primaryKey = "sekolah_id";
    protected $table = "sekolah";

    protected $guarded = ['sekolah_id'];
}
