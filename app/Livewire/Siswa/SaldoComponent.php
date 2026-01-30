<?php

namespace App\Livewire\Siswa;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Kartu as KartuModel;
use App\Traits\BackToCardMenu;

class SaldoComponent extends Component
{
    use BackToCardMenu;

    public KartuModel $kartuModel;

    public function render()
    {
        $now = Carbon::now();
        $formattedDate = $now->format('Y-m-d H:i:s');
        return view('livewire.siswa.saldo-component')->with([
            'terakhir_dilihat' => $formattedDate
        ]);
    }
}
