<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class KartuForm extends Form
{
    #[Validate('required')]
    public $alasan_blokir = '';

    #[Validate('nullable')]
    public $is_hilang = '';
}
