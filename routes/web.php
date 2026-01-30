<?php

use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Siswa;
use App\Livewire\Admin\Petugas;
use App\Livewire\Admin\Kantin;
use App\Livewire\Admin\Kartu;
use App\Livewire\AuthComponent;
use App\Livewire\Siswa\KartuComponent;
use App\Livewire\Siswa\PinComponent;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', AuthComponent::class)->name('login');

Route::prefix('/super-admin')->middleware(['auth', 'is_super_admin'])->group(function () {
    Route::get('/dashboard', Dashboard::class);
});

Route::prefix('/admin')->middleware(['auth', 'is_admin'])->group(function () {
   Route::get('/dashboard', Dashboard::class); 
   Route::get('/siswa', Siswa::class);
   Route::get('/petugas', Petugas::class);
   Route::get('/kantin', Kantin::class);
   Route::get('/kartu', Kartu::class);
});

Route::prefix('/siswa')->group(function () {
    Route::get('/scan-kartu', KartuComponent::class);
    Route::get('/pin', PinComponent::class);
});