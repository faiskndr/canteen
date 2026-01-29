<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class LoginForm extends Form
{
    #[Validate('required|min:5')]
    public $username = '';

    #[Validate('required|min:8')]
    public $password = '';

    protected function rules()
    {
        return [
            'username' => 'required|min:5',
            'password' => 'required|min:8',
        ];
    }
}
