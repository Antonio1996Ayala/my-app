<?php

use Illuminate\Support\Facades\Route;
 

Route::get('/', function () {
    return redirect('/login'); //view('welcome');
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

    //charts
    Route::get('/charts/appointments/line', [App\Http\Controllers\Admin\ChartController::class, 'appointments']);
});

//EN ESTA PARTE DE DEBE AGREGAR "/Doctor" EJEMPLO "\Doctor\DoctorController"
Route::middleware(['auth', 'doctor'])->group(function () {
    Route::get('/schedule', [App\Http\Controllers\Doctor\ScheduleController::class, 'edit']);
    Route::post('/schedule', [App\Http\Controllers\Doctor\ScheduleController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::get('/appointments/create', [App\Http\Controllers\AppointmentController::class, 'create']);
    Route::post('/appointments', [App\Http\Controllers\AppointmentController::class, 'store']);

    /*
    /appointments -> Verificar
    -> que variables pasar a la vista
    -> 1 único blade (condiciones)
    */
    Route::get('/appointments', [App\Http\Controllers\AppointmentController::class, 'index']);
    Route::get('/appointments/{appointment}', [App\Http\Controllers\AppointmentController::class, 'show']);

    Route::get('/appointments/{appointment}/cancel', [App\Http\Controllers\AppointmentController::class, 'showCancelForm']);
    Route::post('/appointments/{appointment}/cancel', [App\Http\Controllers\AppointmentController::class, 'postCancel']);

    Route::post('/appointments/{appointment}/confirm', [App\Http\Controllers\AppointmentController::class, 'postConfirm']);

    //JSON
Route::get('/specialties/{specialty}/doctors', [App\Http\Controllers\Api\SpecialtyController::class, 'doctors']);
Route::get('/schedule/hours', [App\Http\Controllers\Api\ScheduleController::class, 'hours']);
});

