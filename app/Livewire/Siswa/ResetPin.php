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

    protected $listeners = [
        'pin-updated' => 'handlePinUpdated',
    ];

    public function handlePinUpdated(string $pin)
    {
        if (is_null($this->pin)) {
            $this->pin = $pin;
        } else {
            $this->confirmPin = $pin;
        }

        if ($this->pin != $this->confirmPin) {
            $this->addError("pin", "Pin tidak sama!");
        }

        $isPinMatch = true;
    }

    public function resetPins()
    {
        $this->pin = null;
        $this->confirmPin = null;
    }

    public function submit()
    {
        $this->kartuModel->pin = $this->pin;
        $this->kartuModel->save();
    }

    public function render()
    {
        return view('livewire.siswa.reset-pin');
    }
}
