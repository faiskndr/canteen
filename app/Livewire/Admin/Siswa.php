<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\Siswa as SiswaModel;
use App\Livewire\Forms\SiswaForm;
use App\Traits\RedirectToAdminDashboard;

class Siswa extends Component
{
    use WithFileUploads, RedirectToAdminDashboard;

    public SiswaForm $siswaForm;
    public ?SiswaModel $siswaModel = null;

    public $isShowForm = false;
    public $isEdit = false;
    public function render()
    {
        $siswa = SiswaModel::get();
        $totalSiswa = SiswaModel::count();

        foreach ($siswa as $s) {
            $s->foto = Storage::url("siswa/".$s->foto);
        }
    
        return view('livewire.admin.siswa')->with([
            'siswa' => $siswa,
            'total_siswa' => $totalSiswa
        ]);
    }

    public function save()
    {
        $this->validate();

        $params = [];
        if (!is_null($this->siswaForm->foto)) {
            $foto = $this->siswaForm->foto;
            $fileName = $foto->hashName();
            $this->siswaForm->foto->store(path: 'siswa');
            $params = [
                'foto' => $fileName
            ];
        }

        $params = array_merge($params, $this->siswaForm->only([
            'nis', 
            'nama', 
            'kelas',
            'nomor_kartu'
        ]), [
            'sekolah_id' => 1,
        ]);
        
        if (!is_null($this->siswaModel)) {
            $this->siswaModel->update($params);
        } else {
            SiswaModel::create($params);
        }
        
        $this->close();
    }

    public function open(?SiswaModel $siswaModel = null)
    {
        if ($siswaModel->exists) {
            $this->siswaModel = $siswaModel;
            $this->siswaForm->fill($siswaModel);
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
