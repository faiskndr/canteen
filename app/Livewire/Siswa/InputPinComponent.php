<?php

namespace App\Livewire\Siswa;

use Livewire\Component;
use App\Models\Kartu as KartuModel;

class InputPinComponent extends Component
{
    public KartuModel $kartuModel;
    public int $length = 6;
    public string $value = '';
    public string $jenis = '';

    protected $rules = [
        'value' => 'nullable|string',
    ];

    public function render()
    {
        return view('livewire.siswa.input-pin-component');
    }

    public function updatedValue()
    {
        $this->value = substr(preg_replace('/\D/', '', $this->value), 0, $this->length);
        // if (strlen($this->value) === $this->length) {

        // }
    }

    public function submit()
    {
        if ($this->kartuModel->pin != $this->value) {
            $this->addError("pin", "invalid pin!");
        }
        if ($this->jenis == 'top-up') {
            $this->dispatch('nextTopUpStep');
        } else if ($this->jenis == 'payment') {
            $this->dispatch('nextPaymentStep');
        } else {
            $this->dispatch('nextStep');
        }
    }
}
