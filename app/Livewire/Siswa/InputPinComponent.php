<?php

namespace App\Livewire\Siswa;

use Livewire\Component;
use App\Models\Kartu as KartuModel;

class InputPinComponent extends Component
{
    public KartuModel $kartuModel;
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
        if (strlen($this->value) === $this->length) {
            $this->submit();
        }
    }

    public function submit()
    {
        if ($this->kartuModel->pin != $this->value) {
            
            $this->addError("pin", "invalid pin!");
        }

        $this->dispatch('nextStep');
    }
}
