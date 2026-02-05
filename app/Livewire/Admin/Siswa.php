<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Siswa as SiswaModel;
use App\Models\Kartu as KartuModel;
use App\Livewire\Forms\SiswaForm;
use App\Traits\RedirectToAdminDashboard;


class Siswa extends Component
{
    use WithFileUploads,WithPagination, RedirectToAdminDashboard;

    public SiswaForm $siswaForm;
    public ?SiswaModel $siswaModel = null;
    public $cari = '';

    public $isShowForm = false;
    public $isEdit = false;
    public function render()
    {
        $siswa = SiswaModel::when($this->cari, function ($query) {
            $query->where('nama', 'like', '%' .$this->cari .'%')
            ->orWhere('nis', 'like', '%' . $this->cari . '%')
            ->orWhere('kelas', 'like', '%' . $this->cari . '%');
        })->paginate(10);
        $totalSiswa = SiswaModel::count();

        foreach ($siswa as $s) {
            $s->foto = Storage::url("siswa/".$s->foto);
        }
    
        return view('livewire.admin.siswa')->with([
            'siswa' => $siswa,
            'total_siswa' => $totalSiswa
        ]);
    }

    public function updating()
    {
        $this->resetPage();
    }

    public function save()
    {
        $this->validate();
        DB::beginTransaction();
        try {
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
                $siswa = SiswaModel::create($params);
                KartuModel::create([
                    'no_kartu' => $this->siswaForm->nomor_kartu,
                    'pin' => '1234',
                    'status' => 'aktif',
                    'saldo' => 0,
                    'siswa_id' => $siswa->siswa_id
                ]);
            }   
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
        
        $this->close();
    }

    public function delete(?SiswaModel $siswaModel = null)
    {
        $siswaModel->delete();
    }

    public function open(?SiswaModel $siswaModel = null)
    {
        if ($siswaModel->exists) {
            $this->siswaModel = $siswaModel;
            $this->siswaForm->fill($siswaModel);
            $this->siswaForm->nomor_kartu = $siswaModel->kartuRelation?->no_kartu;
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
