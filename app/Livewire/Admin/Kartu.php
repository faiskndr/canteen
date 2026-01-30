<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Kartu as KartuModel;
use App\Traits\RedirectToAdminDashboard;

class Kartu extends Component
{
    use RedirectToAdminDashboard;

    public ?KartuModel $kartuModel;
    public $isShowForm = false;
    public $isEdit = false;

    public function render()
    {
        $kartu = KartuModel::get();
        return view('livewire.admin.kartu')->with([
            'kartu' => $kartu
        ]);
    }

    public function open(?KartuModel $kartuModel = null)
    {
        if ($kartuModel->exists) {
            $this->kartuModel = $kartuModel;
            // $this->kantinForm->fill($kantinModel);
            $this->isEdit = true;
        }
        $this->isShowForm = true;
    }

    public function close()
    {
        $this->isShowForm = false;
        $this->isEdit = false;
        // $this->reset();
    }
}
