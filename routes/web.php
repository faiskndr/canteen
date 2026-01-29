<?php

use App\Livewire\Admin\Dashboard;
use App\Livewire\AuthComponent;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', AuthComponent::class)->name('login');

Route::prefix('/admin')->middleware(['auth'])->group(function () {
   Route::get('/dashboard', Dashboard::class); 
});