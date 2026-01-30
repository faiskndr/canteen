<?php

namespace App\Livewire\Siswa;

use Livewire\Component;
use App\Models\RiwayatSaldo;

class RiwayatTransaksi extends Component
{
    public function render()
    {
        $transaksi = RiwayatSaldo::get();
        $totalData = sizeof($transaksi);
        return view('livewire.siswa.riwayat-transaksi')->with([
            'transaksi' => $transaksi,
            'total_data' => $totalData
        ]);
    }
}
