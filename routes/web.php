<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
Route::get('/', function () {
    return view('auth.login');
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
Route::get('/form_borrow_eq',[HomeController::class,'form_borrow_equment'])->name('form_eq');
Route::post('/store_borrow_eq',[HomeController::class,'borrow_equment'])->name('store_borrow');
Route::get('/manage_borrow/{id}',[HomeController::class,'manage_borrow'])->name('manage_borrow');
Route::put('/update_manage_borrow/{id}',[HomeController::class,'update_manage_borrow'])->name('update_manage_borrow');
Route::get('/personal_borrow/{id}',[HomeController::class,'personal_borrow'])->name('personal_borrow');
Route::put('/update_stage_user_2/{id}',[HomeController::class,'update_stage_user_2'])->name('update_stage_user_2');
Route::put('/update_stage_user_3/{id}',[HomeController::class,'update_stage_user_3'])->name('update_stage_user_3');
Route::put('/update_stage_user_4/{id}',[HomeController::class,'update_stage_user_4'])->name('update_stage_user_4');
Route::get('/borrow_eq_stage/{id}',[HomeController::class,'borrow_eq_stage'])->name('borrow_eq_stage');

Route::get('/manage_user',[HomeController::class,'manage_user'])->name('manage_user');
Route::get('/manage_user/{id}',[HomeController::class,'manage_user_by_id'])->name('manage_user_by_id');
Route::get('/manage_user/edit/{id}',[HomeController::class,'edit_user'])->name('edit_user');
Route::put('/manage_user/update/{id}',[HomeController::class,'update_user'])->name('update_user');
Route::get('/manage_user/delete/{id}',[HomeController::class,'delete_user'])->name('delete_user');


Route::get('/api/device/{id}', [HomeController::class, 'api_device'])->name('api.device.getById');