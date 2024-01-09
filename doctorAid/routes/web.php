<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

// Route::get('/homepage', function () {
//     return view('user_template.homepage');
// })->name('homepage');


Route::controller(AdminController::class)->group(function(){
    Route::get('/admin/dashboard','dashboard')->name('admindashboard');
    Route::get('/admin/add-doctor','addDoctor')->name('adddoctor');
    Route::post('/admin/save-info','saveDoctor')->name('savedoctorinfo');
    Route::get('/admin/edit-info/{id}','editInfo')->name('editinfo');
    Route::post('/admin/update-info','updateDoctor')->name('updateinfo');
    Route::get('/admin/delete-info/{id}','deleteDoctor')->name('deleteinfo');
    Route::get('/admin/schedules','schedules')->name('schedules');
    Route::get('/admin/allschedules','allSchedules')->name('allschedules');
    Route::get('/admin/add-schedules/{id}','addSchedules')->name('addschedules');
    Route::post('/admin/insert-schedule','insertSchedule')->name('insertschedule');
    Route::get('/admin/delete-schedule/{id}','deleteSchedule')->name('deleteschedule');


});


Route::controller(UserController::class)->group(function(){
    Route::get('/register','register')->name('register');
    Route::post('/register','registerUser')->name('register');
    Route::get('/login','login')->name('login');
    Route::get('/homepage','homepage')->name('homepage');
    Route::get('/doc-profile/{id}','docProfile')->name('docprofile');
    Route::get('/specialty-wise/{specialty}','specialtyWise')->name('specialty');
    Route::get('/book-appointment/{id}','bookAppointment')->name('bookappointment');

});