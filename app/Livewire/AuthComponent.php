<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Forms\LoginForm;
use Livewire\Attributes\On;

class AuthComponent extends Component
{
    public LoginForm $loginForm;

    public function render()
    {
        return view('livewire.login');
    }

    public function login()
    {
      $this->validate();
      if (!Auth::attempt([
          'username' => $this->loginForm->username,
          'password' => $this->loginForm->password,
      ])) {
          $this->loginForm->addError('auth', 'Invalid email or password.');
          return;
      }
      session()->regenerate();
      $user = Auth::user();
      $userGroupId = $user->user_group_id;
      
      return match ($userGroupId) {
          1 => redirect()->intended('/superadmin/dashboard'),
          2 => redirect()->intended('/admin/dashboard'),
          default => redirect()->intended('/'),
      };
    }

    public function logout()
    {

    }
}
