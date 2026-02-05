<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\UserGroup;
use App\Models\Kantin;
use App\Livewire\Forms\PetugasForm;
use Illuminate\Support\Facades\Hash;
use App\Traits\RedirectToAdminDashboard;

class Petugas extends Component
{
    use RedirectToAdminDashboard;
    
    public ?User $user = null;
    public PetugasForm $petugasForm;
    public $cari = '';
    public $isShowForm = false;
    public $isEdit = false;
    public $userGroupList = [];
    public $kantinList = [];

    public function render()
    {
        $baseQuery = User::whereIn('user_group_id', [3,4])->when($this->cari, function ($query) {
            $query->where('username', 'like', '%' . $this->cari . '%');
        });
        $petugas = $baseQuery->get();
        $totalPetugas = $baseQuery->count();
        return view('livewire.admin.petugas')->with([
            'petugas' => $petugas,
            'total_petugas' => $totalPetugas
        ]);
    }

    public function save()
    {
        $this->validate();

        $params = array_merge($this->petugasForm->only([
            'username', 
            'user_group_id',
            'kantin_id'
        ]), [
            'password' => Hash::make($this->petugasForm->password),
            'sekolah_id' => 1,
        ]);
    
        if (!is_null($this->user)) {
            $this->user->update($params);
        } else {
            User::create($params);
        }

        $this->close();
    }

    public function open(?User $user = null)
    {
        $this->userGroupList = UserGroup::whereIn('user_group_id', [3,4])->get();
        $this->kantinList = Kantin::select('kantin_id', 'nama')->get();
        if ($user->exists) {
            $this->user = $user;
            $this->petugasForm->fill($user);
            $this->petugasForm->user_group_id = (string) $user->user_group_id;
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
