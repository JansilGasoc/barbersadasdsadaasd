<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ProfileController;
use App\Models\Appointment;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name("wew");

Route::get('/dashboard', function () {
    $appointments = Appointment::orderBy('appointment_time' && 'appointment_date', 'Asc')
        ->paginate(5); // change to 10 if needed
    return view('dashboard', compact('appointments'));
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/book_form', [AppointmentController::class, 'create'])->name('appointments.form');
Route::post('/book_create', [AppointmentController::class, 'store'])->name('appointment.create');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/delete{id}', [AppointmentController::class, 'destroy'])->name('delete-appointment');
});

require __DIR__ . '/auth.php';
