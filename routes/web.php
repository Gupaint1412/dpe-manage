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
