<?php

namespace App\Livewire\Siswa;

use Livewire\Component;
use App\Models\Kartu as KartuModel;
use Livewire\Attributes\On;

class KartuComponent extends Component
{
    public KartuModel $kartuModel;
    public $langkah = 'scan';
    public $nomorKartu = '';
    public function render()
    {
        return view('livewire.siswa.kartu-component');
    }

    public function process()
    {
        $kartuModel = KartuModel::where('no_kartu', $this->nomorKartu)->first();
        if (is_null($this->kartuModel)) {
            $this->addError("kartu", "Nomor kartu tidak terdaftar!");
            return;
        }
        $this->kartuModel = $kartuModel;
        $this->langkah = 'pin';
    }

    #[On('handleStep')]
    public function handleStep($step)
    {
        $this->langkah = $step;
    }
}
