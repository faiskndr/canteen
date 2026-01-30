<?php

namespace App\Models;

use App\Models\BaseModel;

class TopUp extends BaseModel
{
    protected $primaryKey = "top_up_id";
    protected $table = "top_up";

    protected $fillable = [
        "nominal",
        "siswa_id",
        "petugas_top_up_id"
    ];
}
