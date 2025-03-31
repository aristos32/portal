<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\SearchController;
use App\Jobs\TranslateJob;
use Illuminate\Support\Facades\Route;


Route::get('test', function () {

    $job = App\Models\Job::latest()->first();

    TranslateJob::dispatch($job);
});

Route::get('welcome', function () {
    return view('welcome');
});

Route::view('/contact', 'contact');
Route::view('/about', 'about');

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::view('/', 'home')->name('home');
});

Route::post('/search', [SearchController::class, 'search'])->name('search');
Route::get('/search', function () {
    return view('search');
})->name('search.results');

Route::middleware('auth')->group(function () {
    Route::get('/addresses', [AddressController::class, 'index'])->name('addresses.index');
});

require __DIR__ . '/auth.php';
