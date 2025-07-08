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
Route::put('/delete_device/{id}',[HomeController::class,'delete_device'])->name('delete_device');
Route::get('/borrow_eq',[HomeController::class,'borrow_eq'])->name('borrow_eq');

Route::get('/manage_user',[HomeController::class,'manage_user'])->name('manage_user');
Route::get('/manage_user/{id}',[HomeController::class,'manage_user_by_id'])->name('manage_user_by_id');
Route::get('/manage_user/edit/{id}',[HomeController::class,'edit_user'])->name('edit_user');
Route::put('/manage_user/update/{id}',[HomeController::class,'update_user'])->name('update_user');
Route::get('/manage_user/delete/{id}',[HomeController::class,'delete_user'])->name('delete_user');

Route::get('/form_borrow_eq',[HomeController::class,'form_borrow_equment'])->name('form_eq');

Route::get('/api/device/{id}', [HomeController::class, 'api_device'])->name('api.device.getById');