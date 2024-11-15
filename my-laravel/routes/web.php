<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// });

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
    Route::get('/jobs/create', 'create');
    Route::get('/jobs/{job}', 'show');
    Route::post('/jobs', 'store');
    Route::get('/jobs/{job}/edit', 'edit');
    Route::patch('/jobs/{job}', 'update');
    Route::delete('/jobs/{job}', 'destroy');
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

//Auth
// Route::get('/register', [ProfileController::class, 'create'])->name('register');
// Route::get('/login', [ProfileController::class, 'login'])->name('login');
// Route::get('/login', [ProfileController::class, 'logout'])->name('logout');

require __DIR__ . '/auth.php';
