<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function logout()    
    {
        Auth::logout();
        session()->flush();
        return redirect('/login');
    }
}