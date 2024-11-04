<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Admin\AdminDashboard;
use App\Livewire\CartComponent;
use App\Livewire\CarticonComponent;
use App\Livewire\CategoryComponent;
use App\Livewire\CheckoutComponent;
use App\Livewire\Customer\CustomerDashboard;
use App\Livewire\HomeComponent;
use App\Livewire\ProductDetailsComponent;
use App\Livewire\SearchComponent;
use App\Livewire\ShopComponent;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', HomeComponent::class)->name('home');
Route::get('/shop', ShopComponent::class)->name('shop');
Route::get('/cart', CartComponent::class)->name('cart');
Route::get('/product-details/{slug}', ProductDetailsComponent::class)->name('product.details');
Route::get('/checkout', CheckoutComponent::class)->name('checkout');
Route::get('/checkout', CheckoutComponent::class)->name('checkout');
Route::get('/product-category/{slug}', CategoryComponent::class)->name('product.category');
Route::get('/search', SearchComponent::class)->name('search');

// Admin Dashboard
Route::middleware([ 'admin'])->group(function (){
    Route::get('admin/dashboard', AdminDashboard::class)->name('admin.dashboard');
});

// Customer Dashboard
Route::middleware(['auth'])->group(function (){
    Route::get('customer/dashboard', CustomerDashboard::class)->name('customer.dashboard');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
