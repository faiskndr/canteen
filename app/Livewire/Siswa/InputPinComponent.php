<?php

namespace App\Livewire\Siswa;

use Livewire\Component;

class InputPinComponent extends Component
{
    public int $length = 6;
    public string $value = '';

    protected $rules = [
        'value' => 'nullable|string',
    ];

    public function render()
    {
        return view('livewire.siswa.input-pin-component');
    }

    public function updatedValue()
    {
        // Keep only digits and max length
        $this->value = substr(preg_replace('/\D/', '', $this->value), 0, $this->length);
    }
}
