<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\ProfileController;
use App\Livewire\Customer\Index as CustomerController;
use App\Livewire\Administrator\Stok\Index as adminStok;
use App\Livewire\Transaksi\Create as newTransaksi;
use App\Livewire\Transaksi\Index as transaksiIndex;

Route::get('/', function () {
    return view('layouts.app');
});
Route::get('/storage-link', function () {
    Artisan::call('storage:link');
    return 'storage linked successfully';
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('admin/stok', adminStok::class)->name('stok');
    Route::get('admin/CustomerController', CustomerController::class)->name('CustomerController');
    Route::get('admin/transaksi/new/{code?}', newTransaksi::class)->name('transaksi.detail');
    Route::get('admin/transaksi/new/', transaksiIndex::class)->name('transaksi.new');
});

require __DIR__ . '/auth.php';
