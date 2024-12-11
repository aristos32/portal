<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContractController;
use App\Jobs\TranslateJob;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


Route::get('test', function () {
    // Mail::raw('Hello World', function ($message) {
    //     $message->to('test@test.com');
    //     $message->subject('wrosks');
    // });
    // echo'sent';
    $job = App\Models\Job::latest()->first();

    TranslateJob::dispatch($job);

    // dispatch(function () {
    //     logger('hello from the queue!');
    // })->delay(5);
});

Route::get('welcome', function () {
    return view('welcome');
});

Route::view('/', 'home')->name('home');
Route::view('/contact', 'contact');
Route::view('/about', 'about');

// Route::get('/contact', function () {
//     return view('contact');
// });
// Route::get('/about', function () {
//     return view('about');
// });

Route::controller(JobController::class)->group(function () {
    Route::get('/jobs', 'index');
    Route::post('/jobs', 'store');
    Route::get('/jobs/create', 'create');
    Route::get('/jobs/{job}', 'show');
    Route::get('/jobs/{job}/edit', 'edit');
    Route::patch('/jobs/{job}', 'update');
    Route::delete('/jobs/{job}', 'destroy');
});

Route::controller(ContractController::class)->group(function () {
    Route::get('/accounts', 'index')->middleware('auth');
    Route::get('/accounts/create', 'create')->middleware('auth');
});
// shorthand for the above
// Route::resource('jobs', JobController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
