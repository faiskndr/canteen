<?php

namespace App\Models;

use App\Models\BaseModel;

class RiwayatSaldo extends BaseModel
{
    protected $primaryKey = "riwayat_saldo_id";
    protected $table = "riwayat_saldo";

    protected $fillable = [
        'saldo_awal', 
        'saldo_akhir', 
        'jenis', 
        'kartu_id', 
        'transaksi_id',
        'top_up_id'
    ];
}
