<?php

namespace App\Livewire\SuperAdmin;

use Livewire\Component;
use App\Models\Sekolah as SekolahModel;
use Livewire\WithPagination;

class Sekolah extends Component
{
    use WithPagination;

    public $searchQuery = '';
    public $showForm = false;
    public $editingId = null;

    public $name = '';
    public $address = '';
    public $status = 'aktif';

    protected $rules = [
        'name' => 'required|string|max:255',
        'address' => 'required|string',
        'status' => 'required|in:aktif,non-aktif',
    ];

    public function showCreateForm()
    {
        $this->resetForm();
        $this->showForm = true;
    }

    public function save()
    {
        $this->validate();

        SekolahModel::create([
            'nama' => $this->name,
            'alamat' => $this->address,
            'status' => $this->status,
        ]);

        $this->resetForm();
    }

    public function edit(SekolahModel $sekolah)
    {
        $this->editingId = $sekolah->sekolah_id;
        $this->name = $sekolah->nama;
        $this->address = $sekolah->alamat;
        $this->status = $sekolah->status;
        $this->showForm = true;
    }

    public function update()
    {
        $this->validate();

        SekolahModel::findOrFail($this->editingId)->update([
            'nama' => $this->name,
            'alamat' => $this->address,
            'status' => $this->status,
        ]);

        $this->resetForm();
    }

    public function delete($id)
    {
        SekolahModel::findOrFail($id)->delete();
    }

    public function resetForm()
    {
        $this->reset(['name', 'address', 'status', 'editingId']);
        $this->status = 'aktif';
        $this->showForm = false;
    }

    public function render()
    {
        $filteredSchool = SekolahModel::orderBy('dibuat_pada', 'desc')->paginate(10);;
        return view('livewire.super-admin.sekolah')->with([
            'filteredSchools' => $filteredSchool
        ]);
    }
}
