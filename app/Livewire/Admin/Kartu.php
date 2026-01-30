<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Kartu as KartuModel;
use Illuminate\Support\Facades\DB;
use App\Livewire\Forms\KartuForm;
use App\Traits\RedirectToAdminDashboard;

class Kartu extends Component
{
    use RedirectToAdminDashboard;

    public KartuForm $kartuForm;
    public ?KartuModel $kartuModel;
    public $isShowForm = false;
    public $isEdit = false;

    public function render()
    {
        $kartu = KartuModel::get();
        return view('livewire.admin.kartu')->with([
            'kartu' => $kartu
        ]);
    }

    public function open(?KartuModel $kartuModel = null)
    {
        if ($kartuModel->exists) {
            $this->kartuModel = $kartuModel;
            // $this->kantinForm->fill($kantinModel);
            $this->isEdit = true;
        }
        $this->isShowForm = true;
    }

    public function blokir()
    {
        $this->validate();
        DB::beginTransaction();
        try {
            $this->kartuModel->status = 'blokir';
            if ($this->kartuForm->is_hilang == '1') {
                KartuModel::create([
                    'pin' => '1234',
                    'no_kartu' => random_int(1000000000, 9999999999),
                    'status' => 'aktif',
                    'siswa_id' => $this->kartuModel->siswa_id,
                    'saldo' => $this->kartuModel->saldo,
                ]);
                $this->kartuModel->saldo = 0;
            }
            $this->kartuModel->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
        $this->close();
    }

    public function aktivasi(KartuModel $kartuModel)
    {
        // $this->validate();
        DB::beginTransaction();
        try {
            $kartuModel->status = 'aktif';
            $kartuModel->save();
            // if ($this->kartuForm->is_hilang == '1') {
            //     KartuModel::create([
            //         'pin' => '1234',
            //         'no_kartu' => random_int(1000000000, 9999999999),
            //         'status' => 'aktif',
            //         'siswa_id' => $this->kartuModel->siswa_id,
            //         'saldo' => $this->kartuModel->saldo,
            //     ]);
            // }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
        }
        $this->close();
    }

    public function close()
    {
        $this->isShowForm = false;
        $this->isEdit = false;
        // $this->reset();
    }
}
