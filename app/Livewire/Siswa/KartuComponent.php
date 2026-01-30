<?php

namespace App\Livewire\Siswa;

use Livewire\Component;

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
        dd($this->nomorKartu);
        $this->langkah = 'pin';
    }
}
