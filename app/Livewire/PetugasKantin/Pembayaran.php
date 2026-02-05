<?php

namespace App\Livewire\PetugasKantin;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Kartu as KartuModel;
use App\Models\Transaksi as TransaksiModel;
use App\Models\RiwayatSaldo as RiwayatSaldoModel;
use Illuminate\Support\Facades\DB;
use App\Services\AuthService;

class Pembayaran extends Component
{
    public KartuModel $kartuModel;
    public $langkah = 'input';
    public $nomorKartu = '';
    public $jumlah = 0;
    public $saldoLama = 0;

    public function render()
    {
        return view('livewire.petugas-kantin.pembayaran');
    }

    public function logout(AuthService $authService)
    {
        $authService->logout();
    }

    public function handlePembayaranStep($step)
    {
        $this->langkah = $step;
    }

    public function newTransaction()
    {
        $this->langkah = 'input';
        $this->jumlah = 0;
        $this->saldoLama = 0;
    }

    #[On('processPayment')]
    public function processPayment($nomorKartu)
    {
        if (empty($nomorKartu)) {
            // session()->flash('error', 'Invalid nomor kartu!');
            $this->dispatch('flash-error', message: 'Invalid nomor kartu!');
            return;
        }
        $this->nomorKartu = $nomorKartu;
        $this->kartuModel = KartuModel::where("no_kartu", $nomorKartu)->first();

        if ($this->kartuModel->status == "blokir") {
            $this->dispatch('flash-error', message: 'kartu tidak aktif');
        }

        $this->langkah = "pin";
    }

    #[On('handlePayment')]
    public function handlePayment()
    {
        DB::beginTransaction();
        try {
            $petugasKantin = auth()->user();
            $saldoAwal = $this->kartuModel->saldo;
            $this->saldoLama = $saldoAwal;
            $this->kartuModel->saldo -= $this->jumlah;
            $this->kartuModel->save();

            $transaksi = TransaksiModel::create([
                    'total_belanja' => $this->jumlah,
                    'kantin_id' => $petugasKantin->kantin_id,
                    'siswa_id' => $this->kartuModel->siswa_id,
                    'petugas_kantin_id' => $petugasKantin->user_id
                ]);

            RiwayatSaldoModel::create([
                'saldo_awal' => $saldoAwal,
                'saldo_akhir' => $this->kartuModel->saldo,
                'jenis' => 'debit',
                'kartu_id' => $this->kartuModel->kartu_id,
                'transaksi_id' => $transaksi->transaksi_id
            ]);
            DB::commit();
            $this->langkah = "status-pembayaran";
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
        }
    }
}
