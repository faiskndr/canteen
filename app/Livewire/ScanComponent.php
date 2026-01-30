<?php

namespace App\Livewire;

use Livewire\Component;

class ScanComponent extends Component
{
    public $nomorKartu = '';
    public function render()
    {
        return view('livewire.scan-component');
    }

    public function process()
    {
        $this->dispatch('processPayment', $this->nomorKartu);
    }
}
