<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
// use App\Models\Transaksi as TransaksiModel;
use App\Models\RiwayatSaldo;
use App\Models\TopUp;
use App\Models\Siswa;
use App\Models\Transaksi as TransaksiModel;
use App\Traits\RedirectToAdminDashboard;

class Transaksi extends Component
{
    use RedirectToAdminDashboard, WithPagination;

    public $cari = '';
    public $jenis_transaksi = '';
    
    public function render()
    {
        $kartuId = [];
        if (!empty($this->cari)) {
            $kartuId = Siswa::where('nama', 'like', '%' . $this->cari . '%')
                ->join('kartu', 'siswa.siswa_id', 'kartu.siswa_id')
                ->orWhere('nis', 'like', '%' . $this->cari . '%')
                ->select('kartu_id', 'siswa.siswa_id')
                ->pluck('siswa_id', 'kartu_id')
                ->toArray();
        }
        
        $baseQuery = RiwayatSaldo::when($this->cari, function($query) use ($kartuId) {
            $query->whereIn('kartu_id', array_keys($kartuId));
        })
        ->when($this->jenis_transaksi, function($query) {
            if ($this->jenis_transaksi == 'top-up') {
                $query->whereNotNull('top_up_id');
            } else if ($this->jenis_transaksi == 'debit') {
                $query->whereNotNull('transaksi_id');
            }
        })
        ->orderBy('dibuat_pada', 'desc');
        $transaksi = $baseQuery->paginate(10);
        $totalTransaksi = $baseQuery->count();
        $totalTopUp = TopUp::when($this->cari, function($query) use ($kartuId) {
            $query->whereIn('siswa_id', array_values($kartuId));
        })->sum('nominal');
        $totalDihabiskan = TransaksiModel::when($this->cari, function($query) use ($kartuId) {
            $query->whereIn('siswa_id', array_values($kartuId));
        })->sum('total_belanja');

        return view('livewire.admin.transaksi')->with([
            'transaksi' => $transaksi,
            'total_transaksi' => $totalTransaksi,
            'total_top_up' => $totalTopUp,
            'total_dihabiskan' => $totalDihabiskan
        ]);
    }

    public function updating($property)
    {
        if (in_array($property, ['cari', 'jenis_transaksi'])) {
            $this->resetPage();
        }
    }
}
