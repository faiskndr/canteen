<?php

namespace App\Livewire\Siswa;

use Livewire\Component;
use App\Models\Kartu as KartuModel;

class InputPinComponent extends Component
{
    public KartuModel $kartuModel;
    public int $length = 6;
    public array $value = [];
    public string $jenis = '';
    public $isShowSubmit = true;

    protected $rules = [
        'value' => 'nullable|string',
    ];

    public function render()
    {
        return view('livewire.siswa.input-pin-component');
    }

    public function updatedValue()
    {
        

    }

    public function setChar(int $index, string $char)
    {
        $this->value[$index] = $char;
        if ($this->jenis == 'reset-pin') {
            if (sizeof($this->value) === $this->length) {
                $this->dispatch(
                    'pin-updated',
                    pin: implode('', $this->value)
                );
            }   
        }
        // $chars = str_split(str_pad($this->value, $this->length));
        // if ($index == 1) dd($char);
        // $chars[$index] = $char ?: '';
    
        // $this->value = implode('', $chars);
        
    }

    public function submit()
    {
        $pin = implode('', $this->value);
        if ($this->kartuModel->pin != $pin) {
            $this->dispatch('flash-error', message: 'Invalid pin');
            return;
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
