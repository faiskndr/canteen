<?php

namespace App\Models;

use App\Models\BaseModel;

class Transaksi extends BaseModel
{
    protected $primaryKey = "transaksi_id";
    protected $table = "transaksi";

    protected $guarded = ['transaksi_id'];
}
