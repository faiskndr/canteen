<?php

namespace App\Livewire\PetugasTopUp;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use App\Models\Kartu as KartuModel;
use App\Models\TopUp as TopUpModel;
use App\Models\RiwayatSaldo as RiwayatSaldoModel;
use App\Services\AuthService;

class TopUp extends Component
{
    public KartuModel $kartuModel;
    public $langkah = 'scan';
    public $nomorKartu = '';
    public $jumlah = 0;
    public $pintasan = [5000, 10000, 20000, 50000, 100000];

    public function render()
    {
        return view('livewire.petugas-top-up.top-up');
    }

    public function logout(AuthService $authService)
    {
        $authService->logout();
    }

    public function process()
    {
        $this->kartuModel = KartuModel::where('no_kartu', $this->nomorKartu)->first();
        if (is_null($this->kartuModel)) {
            $this->addError("kartu", "Nomor kartu tidak terdaftar!");
            return;
        }
        $this->langkah = 'pin';
    }

    public function processTopUp()
    {
        DB::beginTransaction();
        try {
            $saldoAwal = $this->kartuModel->saldo;
            $this->kartuModel->saldo += $this->jumlah;
            $this->kartuModel->save();

            $topUp = TopUpModel::create([
                    'nominal' => $this->jumlah,
                    'siswa_id' => $this->kartuModel->siswa_id,
                    'petugas_top_up_id' => auth()->user()->user_id
                ]);

            RiwayatSaldoModel::create([
                'saldo_awal' => $saldoAwal,
                'saldo_akhir' => $this->kartuModel->saldo,
                'jenis' => 'top-up',
                'kartu_id' => $this->kartuModel->kartu_id,
                'top_up_id' => $topUp->top_up_id
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
        }
    }

    public function add($val)
    {
        $this->jumlah += (int) $val;
    }

    #[On('handleTopUpStep')]
    public function handleTopUpStep($step)
    {
        $this->langkah = $step;
    }
}
