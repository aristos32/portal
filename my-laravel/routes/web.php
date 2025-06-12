<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

// Redirect base URL to default locale
Route::get('/', function () {
    return redirect('/en/home');
});

Route::get('/dashboard', function () {
    return redirect('/en/home');
})->middleware(['auth', 'verified'])->name('dashboard');

// Group all routes with {locale} prefix
Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => 'en|gr'],
    'middleware' => ['setLocale'],
], function () {

    Route::view('/contact', 'contact')->name('contact');
    Route::view('/about', 'about')->name('about');

    Route::controller(JobController::class)->group(function () {
        Route::get('/jobs', 'index')->name('jobs.index');
        Route::post('/jobs', 'store')->name('jobs.store');
        Route::get('/jobs/create', 'create')->name('jobs.create');
        Route::get('/jobs/{job}', 'show')->name('jobs.show');
        Route::get('/jobs/{job}/edit', 'edit')->name('jobs.edit');
        Route::patch('/jobs/{job}', 'update')->name('jobs.update');
        Route::delete('/jobs/{job}', 'destroy')->name('jobs.destroy');
    });

    Route::controller(ContractController::class)->group(function () {
        Route::get('/accounts', 'index')->middleware('auth')->name('accounts.index');
        Route::get('/accounts/create', 'create')->middleware('auth')->name('accounts.create');
    });


    Route::middleware('auth')->group(function () {

        Route::get('/home', [SearchController::class, 'fillDashboard'])->name('home');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::get('/search', [SearchController::class, 'index'])->name('search.form');
        Route::post('/search', [SearchController::class, 'search'])->name('search.process');
        Route::get('/addresses', [AddressController::class, 'index'])->name('addresses.index');

        // customer routes
        Route::controller(CustomerController::class)->group(function () {
            Route::get('/customers', 'index')->name('customers.index');
            Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
            Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
            Route::get('/customers/{id}', 'show')->name('customers.show');
            Route::patch('/customers/{id}', 'update')->name('customers.update');
        });
    });

    require __DIR__ . '/auth.php';
});
