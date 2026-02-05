<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TopUp extends BaseModel
{
    use HasFactory;
    
    protected $primaryKey = "top_up_id";
    protected $table = "top_up";

    protected $fillable = [
        "nominal",
        "siswa_id",
        "petugas_top_up_id"
    ];
}
