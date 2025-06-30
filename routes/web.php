<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/device', [HomeController::class, 'device'])->name('device');
Route::get('/add_device',[HomeController::class,'add_device'])->name('add_device');
Route::post('/store_device',[HomeController::class,'store_device'])->name('store_device');
Route::get('/edit_device/{id}',[HomeController::class,'edit_device'])->name('edit_device');
Route::put('/update_device/{id}',[HomeController::class,'update_device'])->name('update_device');
Route::get('/delete_device/{id}',[HomeController::class,'delete_device'])->name('delete_device');
Route::get('/borrow_eq',[HomeController::class,'borrow_eq'])->name('borrow_eq');

Route::get('/api/device/{id}', [HomeController::class, 'api_device'])->name('api.device.getById');