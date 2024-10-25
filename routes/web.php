<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Admin\AdminDashboard;
use App\Livewire\Customer\CustomerDashboard;
use App\Livewire\HomeComponent;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', HomeComponent::class)->name('home');

// Admin Dashboard
// Route::middleware(['auth', 'admin'])->group(function (){
//     Route::get('admin/dashboard', AdminDashboard::class)->name('admin.dashboard');
// });
    Route::get('admin/dashboard', AdminDashboard::class)->name('admin.dashboard')->middleware('admin');

// User Dashboard
Route::middleware(['auth'])->group(function (){
    Route::get('customer/dashboard', CustomerDashboard::class)->name('customer.dashboard');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
