<?php

namespace App\Livewire\Siswa;

use Livewire\Component;
use App\Models\Kartu as KartuModel;

class ResetPin extends Component
{
    public KartuModel $kartuModel;
    public ?string $pin = null;
    public ?string $confirmPin = null;
    public $jenis = 'reset-pin';
    public $isPinMatch = false;
    public string $pinKey;
    public string $confirmPinKey;

    protected $listeners = [
        'pin-updated' => 'handlePinUpdated',
    ];

    public function mount()
    {
        $this->resetKeys();
    }

    protected function resetKeys()
    {
        $this->pinKey = uniqid();
        $this->confirmPinKey = uniqid();
    }

    public function handlePinUpdated(string $pin)
    {
        $this->isPinMatch = true;
        $this->resetErrorBag();
        if (is_null($this->pin)) {
            $this->pin = $pin;
        } else {
            $this->confirmPin = $pin;
        }
    
        if ($this->pin != $this->confirmPin && strlen($this->pin) == 4 && strlen($this->confirmPin) == 4) {
            $this->addError("pin", "Pin tidak sama!");
        }

        if ($this->pin == $this->confirmPin && strlen($this->pin) == 4 && strlen($this->confirmPin) == 4) {
            $this->isPinMatch = true;
        }   
    }

    public function resetPins()
    {
        $this->pin = null;
        $this->confirmPin = null;
    }

    public function submit()
    {
        if ($this->pin != $this->confirmPin && strlen($this->pin) == 4 && strlen($this->confirmPin) == 4) {
            $this->addError("pin", "Pin tidak sama!");
        }

        if ($this->pin == $this->confirmPin && strlen($this->pin) == 4 && strlen($this->confirmPin) == 4) {
            $this->kartuModel->pin = $this->pin;
            $this->kartuModel->save();
            $this->dispatch('handleStep', 'scan');
        } else {
            $this->addError("pin", "Pin tidak valid!");
        }
    }

    public function render()
    {
        return view('livewire.siswa.reset-pin');
    }
}
