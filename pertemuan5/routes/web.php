<?php

use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;


Route::get('/buku',[BukuController::class,'index']);
Route::get( '/buku/create' , [BukuController::class,'create'])->name('buku.create'); //get buat memanggil saja
Route::post('/buku', [BukuController::class,'store'])->name('buku.store'); //post buat ngirim data
Route::delete('/buku/{id}', [BukuController::class,'destroy'])->name('buku.destroy');
Route::get('/buku/{id}/edit',[BukuController::class,'edit'])->name('buku.edit');
Route::put('/buku/{id}',[BukuController::class,'update'])->name('buku.update');