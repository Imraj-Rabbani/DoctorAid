<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/homepage', function () {
    return view('user_template.homepage');
})->name('homepage');


Route::controller(AdminController::class)->group(function(){
    Route::get('/admin/dashboard','dashboard')->name('admindashboard');
    Route::get('/admin/add-doctor','addDoctor')->name('adddoctor');
    Route::post('/admin/save-info','saveDoctor')->name('savedoctorinfo');
    Route::get('/admin/edit-info/{id}','editInfo')->name('editinfo');
    Route::post('/admin/update-info','updateDoctor')->name('updateinfo');
    Route::get('/admin/delete-info/{id}','deleteDoctor')->name('deleteinfo');

});