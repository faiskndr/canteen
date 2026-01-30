<?php
namespace App\Traits;

trait RedirectToAdminDashboard
{
    public function goToDashboard()
    {
        $this->redirect('/admin/dashboard', navigate: true);
    }
}