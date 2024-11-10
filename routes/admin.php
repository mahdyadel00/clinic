<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\{DoctorScheduleShiftController,
    PatientController,
    RoomController,
    UserController,
    AdminController,
    MajorController,
    DoctorController,
    BookingController,
    ContactController,
    SettingController,
    auth\LoginController,
    UserScheduleController};

Route::group(['prefix' => 'admin','as' => 'admin.'] , function() {
    // Guest
    Route::group([ 'middleware' => ['guest'], 'controller' => LoginController::class,
    ],
    function() {
        Route::get('/login', 'loginPage')->name('loginPage');
        Route::post('/login', 'login')->name('login');
    }
    );

    // Auth
    Route::group([
        'middleware' => ['auth', 'checkIsAdmin']
    ],
    function() {

    Route::get('', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    //Patients
    Route::resource('patients', PatientController::class);

    //Doctor Schedule Shift
    Route::resource('doctor-schedule-shifts', DoctorScheduleShiftController::class);

    //User Schedule
    Route::resource('user-schedules', UserScheduleController::class);

    //Rooms
    Route::resource('rooms', RoomController::class);

    // Users
    Route::resource('users', UserController::class);

    // Majors
    Route::get('/majors', [MajorController::class, 'index'])->name('major.index');
    Route::get('/majors/create', [MajorController::class, 'create'])->name('major.create');
    Route::post('/majors/store', [MajorController::class, 'store'])->name('major.store');
    Route::get('/majors/edit/{major}', [MajorController::class, 'edit'])->name('major.edit');
    Route::put('/majors/update/{major}', [MajorController::class, 'update'])->name('major.update');
    Route::delete('/majors/delete/{major}', [MajorController::class, 'destroy'])->name('major.destroy');

    // Doctors
    Route::get('/doctors', [DoctorController::class, 'index'])->name('doctor.index');
    Route::get('/doctors/create', [DoctorController::class, 'create'])->name('doctor.create');
    Route::post('/doctors/store', [DoctorController::class, 'store'])->name('doctor.store');
    Route::get('/doctors/edit/{doctor}', [DoctorController::class, 'edit'])->name('doctor.edit');
    Route::put('/doctors/update/{doctor}', [DoctorController::class, 'update'])->name('doctor.update');
    Route::delete('/doctors/delete/{doctor}', [DoctorController::class, 'destroy'])->name('doctor.destroy');

    // Bookings
    Route::get('/bookings', [BookingController::class, 'index'])->name('booking.index');
    Route::delete('/bookings/delete/{booking}', [BookingController::class, 'destroy'])->name('booking.destroy');

    // contacts
    Route::get('/contacts', [ContactController::class, 'index'])->name('contact.index');
    Route::delete('/contacts/delete/{contact}', [ContactController::class, 'destroy'])->name('contact.destroy');

     // Settings
     Route::get('/settings', [SettingController::class, 'edit'])->name('settings.edit');
     Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
    }
    );
});
