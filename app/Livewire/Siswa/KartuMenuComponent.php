<?php

namespace App\Livewire\Siswa;

use Livewire\Component;

class KartuMenuComponent extends Component
{
    public function render()
    {
        return view('livewire.siswa.kartu-menu-component');
    }

    public function selectMenu($menu)
    {
        $this->dispatch('handleStep', $menu);
    }
}
