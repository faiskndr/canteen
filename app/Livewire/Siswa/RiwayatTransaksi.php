<?php

namespace App\Livewire\Siswa;

use Livewire\Component;
use App\Models\RiwayatSaldo;
use App\Traits\BackToCardMenu;

class RiwayatTransaksi extends Component
{
    use BackToCardMenu;
    
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
