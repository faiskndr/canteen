<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Kantin as KantinModel;
use App\Livewire\Forms\KantinForm;
use App\Traits\RedirectToAdminDashboard;

class Kantin extends Component
{
    use RedirectToAdminDashboard;

    public KantinForm $kantinForm;
    public ?KantinModel $kantinModel = null;
    public $cari = '';
    public $isShowForm = false;
    public $isEdit = false;

    public function render()
    {
        $baseQuery = KantinModel::when($this->cari, function($query) {
            $query->where('nama', 'like', '%' . $this->cari . '%');
        });
        $total = $baseQuery->count();
        $kantin = $baseQuery->get();
        return view('livewire.admin.kantin')->with([
            'kantin' => $kantin,
            'total' => $total
        ]);
    }

    public function save()
    {
        $this->validate();

        $params = [];
        $params = array_merge($params, $this->kantinForm->only([ 
            'nama'
        ]), [
            'lokasi' => 'Dalam sekolah',
            'sekolah_id' => 1,
        ]);
        
        if (!is_null($this->kantinModel)) {
            $this->kantinModel->update($params);
        } else {
            KantinModel::create($params);
        }
        
        $this->close();
    }

    public function open(?KantinModel $kantinModel = null)
    {
        if ($kantinModel->exists) {
            $this->kantinModel = $kantinModel;
            $this->kantinForm->fill($kantinModel);
            $this->isEdit = true;
        }
        $this->isShowForm = true;
    }

    public function close()
    {
        $this->isShowForm = false;
        $this->isEdit = false;
        $this->reset();
    }
}
