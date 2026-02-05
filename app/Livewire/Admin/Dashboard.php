<?php

namespace App\Livewire\Admin;

use App\Services\AuthService;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard');
    }

    public function logout(AuthService $authService)
    {
        $authService->logout();
    }

    public function goToSiswa()
    {
        $this->redirect('/admin/siswa', navigate: true);
    }

    public function goToPetugas()
    {
        $this->redirect('/admin/petugas', navigate: true);
    }

    public function goToKantin()
    {
        $this->redirect('/admin/kantin', navigate: true);
    }

    public function goToKartu()
    {
        $this->redirect('/admin/kartu', navigate: true);
    }

        public function goToTransaksi()
    {
        $this->redirect('/admin/transaksi', navigate: true);
    }
}
