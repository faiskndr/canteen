<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RiwayatSaldo extends BaseModel
{
    use HasFactory;
    
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

    public function kartuRelation() {
        return $this->belongsTo(Kartu::class, 'kartu_id', 'kartu_id');
    }
}
