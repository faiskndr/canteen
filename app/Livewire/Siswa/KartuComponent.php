<?php

namespace App\Livewire\Siswa;

use Livewire\Component;
use App\Models\Kartu as KartuModel;

class KartuComponent extends Component
{
    public $langkah = 'scan';
    public $nomorKartu = '';
    public function render()
    {
        return view('livewire.siswa.kartu-component');
    }

    public function process()
    {
        if (KartuModel::where('no_kartu', $this->nomorKartu)->count() == 0) {
            $this->addError("kartu", "Nomor kartu tidak terdaftar!");
            return;
        }
        $this->langkah = 'pin';
    }
}
