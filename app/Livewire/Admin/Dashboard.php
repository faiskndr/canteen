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
}
