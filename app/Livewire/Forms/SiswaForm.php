<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use Livewire\Form;

class SiswaForm extends Form
{
    use WithFileUploads;
    #[Validate('required')]
    public $nis = '';

    #[Validate('required')]
    public $nama = '';

    #[Validate('required')]
    public $kelas = '';

    #[Validate('required')]
    public $nomor_kartu ='';

    #[Validate('nullable|image|max:2048')]
    public $foto;
}
