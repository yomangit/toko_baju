<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\ProfileController;
use App\Livewire\Customer\Index as CustomerController;
use App\Livewire\Administrator\Stok\Index as adminStok;

Route::get('/', function () {
    return view('layouts.app');
});
Route::get('/storage-link',function(){
    Artisan::call('storage:link');
    return 'storage linked successfully';
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('admin/stok',adminStok::class)->name('stok');
Route::get('admin/CustomerController',CustomerController::class)->name('CustomerController');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
