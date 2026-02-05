<?php

namespace App\Livewire\Siswa;

use Livewire\Component;

class ResetPinSuccess extends Component
{
    public function render()
    {
        return view('livewire.siswa.reset-pin-success');
    }

    public function logout()
    {
        $this->dispatch('handleStep', 'scan');
    }
}
