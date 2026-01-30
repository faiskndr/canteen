<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class KantinForm extends Form
{
    #[Validate('required')]
    public $nama = '';
}
