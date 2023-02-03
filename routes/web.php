<?php

use Illuminate\Support\Facades\Route;
 

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Specialty
Route::get('/specialties', [App\Http\Controllers\SpecialtyController::class, 'index']);
Route::get('/specialties/create', [App\Http\Controllers\SpecialtyController::class, 'create']);
Route::get('/specialties/{specialty}/edit', [App\Http\Controllers\SpecialtyController::class, 'edit']);

Route::post('/specialties', [App\Http\Controllers\SpecialtyController::class, 'store']);
Route::put('/specialties/{specialty}', [App\Http\Controllers\SpecialtyController::class, 'update']);
Route::delete('/specialties/{specialty}', [App\Http\Controllers\SpecialtyController::class, 'destroy']);

//Doctors
Route::resource('doctors', 'App\Http\Controllers\DoctorController');
//Pacients