<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

// Index
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->simplePaginate(3); //eager loading - to avoid N+1 problem

    return view('jobs.index', [
        'jobs' => $jobs,
    ]);
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/about', function () {
    return view('about');
});

// Create
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

// Show using Route Model Binding
Route::get('/jobs/{job}', function (Job $job) {
    // $job = Job::find($id);

    return view('jobs.show', [
        'job' => $job,
    ]);
});

// Store
Route::post('/jobs', function () {

    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1,
    ]);

    return redirect('/jobs');
});

// Edit using Route Model Binding
Route::get('/jobs/{job}/edit', function (Job $job) {
    //$job = Job::find($id);

    return view('jobs.edit', [
        'job' => $job,
    ]);
});

// Update
Route::patch('/jobs/{job}', function (Job $job) {
    // authorize (On hold...)

    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
    ]);

    // update
    // $job = Job::findOrFail($id);
    // $job->title = request('title');
    // $job->salary = request('salary');
    // $job->save();

    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);

    return redirect("/jobs/{$job->id}");
});

// Destroy
Route::delete('/jobs/{job}', function (Job $job) {
    // authorize (On hold...)

    //$job = Job::findOrFail($id);
    $job->delete();

    return redirect('/jobs');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
