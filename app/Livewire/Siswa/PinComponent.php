<?php

namespace App\Livewire\Siswa;

use Livewire\Component;
use App\Models\Kartu as KartuModel;
use Livewire\Attributes\On;

class PinComponent extends Component
{
    public KartuModel $kartuModel;

    public function render()
    {
        return view('livewire.siswa.pin-component');
    }

    #[On('nextStep')]
    public function handleStep()
    {
        $this->dispatch('handleStep', 'menu');
    }
}
