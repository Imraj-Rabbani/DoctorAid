<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::middleware(['checkRole'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/dashboard', 'dashboard')->name('admindashboard');
        Route::get('/admin/add-doctor', 'addDoctor')->name('adddoctor');
        Route::post('/admin/save-info', 'saveDoctor')->name('savedoctorinfo');
        Route::get('/admin/edit-info/{id}', 'editInfo')->name('editinfo');
        Route::post('/admin/update-info', 'updateDoctor')->name('updateinfo');
        Route::get('/admin/delete-info/{id}', 'deleteDoctor')->name('deleteinfo');
        Route::get('/admin/allschedules', 'allSchedules')->name('allschedules');
        Route::get('/admin/add-schedules/{id}', 'addSchedules')->name('addschedules');
        Route::post('/admin/insert-schedule', 'insertSchedule')->name('insertschedule');
        Route::get('/admin/delete-schedule/{id}', 'deleteSchedule')->name('deleteschedule');
    });
});




Route::controller(UserController::class)->group(function () {
    Route::get('/homepage', 'homepage')->name('homepage');
    Route::get('/doc-profile/{id}', 'docProfile')->name('docprofile');
    Route::get('/specialty-wise/{specialty}', 'specialtyWise')->name('specialty');

});

Route::middleware('auth')->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('/profile', 'profile')->name('profile');
        Route::post('/book-appointment', 'bookAppointment')->name('bookappointment');
        Route::post('/submit-review', 'reviewSubmission')->name('submitreview');
        Route::post('/cancel-appointment', 'cancelAppointment')->name('cancelappointment');
    });
});





require __DIR__ . '/auth.php';