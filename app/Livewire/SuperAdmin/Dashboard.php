<?php

namespace App\Livewire\SuperAdmin;

use Livewire\Component;
use App\Services\AuthService;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.super-admin.dashboard');
    }

    public function logout(AuthService $authService)
    {
        $authService->logout();
    }

    public function selectSchools()
    {
        return $this->redirect('/super-admin/sekolah', navigate: true);
    }

    public function selectSchoolAdmins()
    {
        return $this->redirect('/super-admin/admin-sekolah', navigate: true);
    }

    public function selectMaintenance()
    {
        return $this->redirect('/super-admin/maintenance', navigate: true);
    }

    public function selectBackup()
    {
        return $this->redirect('/super-admin/backup', navigate: true);
    }
}
