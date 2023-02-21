<?php

use Illuminate\Support\Facades\Route;
 

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Middleware
Route::middleware(['auth', 'admin'])->group(function () {
    //Specialty
    Route::get('/specialties', [App\Http\Controllers\Admin\SpecialtyController::class, 'index']);
    Route::get('/specialties/create', [App\Http\Controllers\Admin\SpecialtyController::class, 'create']);
    Route::get('/specialties/{specialty}/edit', [App\Http\Controllers\Admin\SpecialtyController::class, 'edit']);

    Route::post('/specialties', [App\Http\Controllers\Admin\SpecialtyController::class, 'store']);
    Route::put('/specialties/{specialty}', [App\Http\Controllers\Admin\SpecialtyController::class, 'update']);
    Route::delete('/specialties/{specialty}', [App\Http\Controllers\Admin\SpecialtyController::class, 'destroy']);

    //Doctors
    Route::resource('doctors', 'App\Http\Controllers\Admin\DoctorController');
    //Patients
    Route::resource('patients', 'App\Http\Controllers\Admin\PatientController');
});

//EN ESTA PARTE DE DEBE AGREGAR "/Doctor" EJEMPLO "\Doctor\DoctorController"
Route::middleware(['auth', 'doctor'])->group(function () {
    Route::get('/schedule', [App\Http\Controllers\Doctor\ScheduleController::class, 'edit']);
    Route::post('/schedule', [App\Http\Controllers\Doctor\ScheduleController::class, 'store']);
});