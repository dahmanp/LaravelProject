<?php

use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use App\Jobs\TranslateJob;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;

Route::get('test', function () {
    $job = Job::first();
    TranslateJob::dispatch($job);

    return 'Done';
});

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

Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create']);
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');
Route::get('/jobs/{job}', [JobController::class, 'show']);
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'job');
Route::patch('/jobs/{job}', [JobController::class, 'update'])
    ->middleware('auth')
    ->can('edit', 'job');
Route::delete('/jobs/{job}', [JobController::class, 'destroy'])
    ->middleware('auth')
    ->can('edit', 'job');

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);
