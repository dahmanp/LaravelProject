<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\JobController;

Route::view('/', 'home');
Route::view('/contact', 'contact');

/*Route::controller(JobController::class)->group(function () {
//Index
    Route::get('/jobs', 'index');

//Create
    Route::get('/jobs/create', 'create');

//Show
    Route::get('/jobs/{job}', 'show');

//Store
    Route::post('/jobs', 'store');

//Edit
    Route::get('/jobs/{job}/edit', 'edit');

//Update
//I TRIED USING PATCH BUT IT KEPT GIVING ME ERRORS - this seems to work
    Route::post('/jobs/{job}', 'update');

//Destroy
//THIS DOESN'T SEEM TO WORK EITHER - gives me a page expired page - 419
    Route::delete('/jobs/{job}', 'destroy');
});*/

Route::resource('jobs', JobController::class);
