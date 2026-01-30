<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class PetugasForm extends Form
{
    #[Validate('required')]
    public $username = '';

    #[Validate('required')]
    public $password = '';

    #[Validate('required')]
    public $user_group_id = '';

    #[Validate('nullable')]
    public $kantin_id = '';
}
