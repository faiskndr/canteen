<?php

namespace App\Livewire\SuperAdmin;

use Livewire\Component;
use App\Models\User;
use App\Models\Sekolah;

class AdminSekolah extends Component
{
    public $schoolAdmins = [];
    public $schools = [];

    public $showForm = false;
    public $editingId = null;
    public $searchQuery = '';

    // form fields
    public $schoolId = '';
    public $username = '';
    public $password = '';
    public $role = 2;

    protected function rules()
    {
        return [
            'schoolId' => 'required',
            'username' => 'required|string|max:255',
            'password' => $this->editingId ? 'nullable|min:6' : 'required|min:6',
            'status' => 'required|in:aktif,non-aktif',
        ];
    }

    public function showCreateForm()
    {
        $this->resetForm();
        $this->showForm = true;
    }

    public function save()
    {
        $this->validate();

        User::create([
            'sekolah_id' => $this->schoolId,
            'username'  => $this->username,
            'password'  => Hash::make($this->password),
            'role'      => $this->role,
        ]);
        $this->resetForm();
    }

    public function edit(User $admin)
    {
        $this->editingId = $admin->id;
        $this->schoolId  = $admin->sekola_id;
        $this->username  = $admin->username;
        $this->role      = $admin->user_group_id;

        $this->password = '';
        $this->showForm = true;
    }

    public function update()
    {
        $this->validate();

        $admin = User::findOrFail($this->editingId);

        $data = [
            'sekolah_id' => $this->schoolId,
            'username'  => $this->username,
            'user_group_id'      => $this->role,
        ];

        if ($this->password) {
            $data['password'] = Hash::make($this->password);
        }

        $admin->update($data);
        $this->resetForm();
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
    }

    public function resetForm()
    {
        $this->reset([
            'schoolId',
            'username',
            'password',
            'role',
            'editingId',
        ]);
        
        $this->showForm = false;
    }

    public function render()
    {
        $filteredAdmins = User::where('user_group_id', 2)->paginate(10);
        $sekolah = Sekolah::get();
        return view('livewire.super-admin.admin-sekolah')->with([
            'filteredAdmins' => $filteredAdmins,
            'sekolah' => $sekolah
        ]);
    }
}
