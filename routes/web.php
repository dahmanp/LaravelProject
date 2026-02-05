<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function (Request $request) {
    /*$jobs = Job::with('employer')->get();*/
    $sort = $request->query('sort', 'id');

    $jobs = Job::with('employer')
        ->when($sort === 'title', function ($query) {
            $query->orderBy('title', 'asc');
        })
        ->when($sort !== 'title', function ($query) use ($sort) {
            $query->orderBy($sort);
        })
        ->when(!in_array($sort, ['title', 'salary']), function ($query) use ($sort) {
            $query->orderBy($sort);
        })
        ->get();

    return view('jobs', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);

    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});
