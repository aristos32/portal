<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Mail\ContractExpiringSoon;
use App\Models\Contract;

// Redirect base URL to default locale
Route::get('/', function () {
    return redirect('/en/home');
});

Route::get('/test', function () {
    Mail::to('aristos.aresti@gmail.com')->send(new ContractExpiringSoon(Contract::find(1)));
    return 'Email sent';
    // return new ContractExpiringSoon(Contract::find(1));
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


    Route::middleware('auth')->group(function () {

        Route::get('/home', [HomeController::class, 'index'])->name('home');

        Route::controller(ProfileController::class)->group(function(){

            Route::get('/profile/edit', 'edit')->name('profile.edit');
            Route::patch('/profile', 'update')->name('profile.update');
            Route::delete('/profile', 'destroy')->name('profile.destroy');

        });

        Route::controller(AddressController::class)->group(function(){
            Route::get('/addresses', 'index')->name('addresses.index');
        });


        Route::controller(SearchController::class)->group(function(){
            Route::post('/search', 'search')->name('search');
        });

        Route::controller(CustomerController::class)->group(function () {
            Route::get('/customers', 'index')->name('customers.index');
            Route::get('/customers/{customer}', 'show')->name('customers.show');
            Route::get('/customers/{customer}/edit', 'edit')->name('customers.edit');
            Route::patch('/customers/{id}', 'update')->name('customers.update');
            Route::delete('/customers/{id}', 'destroy')->name('customers.destroy');
        });

        Route::controller(ContractController::class)->group(function () {
            Route::get('/contracts', 'index')->name('contracts.index');
            Route::get('/contracts/{contract}', 'show')->name('contracts.show');
            Route::get('/contracts/{contract}/edit', 'edit')->name('contracts.edit');
            Route::patch('/contracts/{contract}', 'update')->name('contracts.update');
            Route::delete('/contracts/{contract}', 'destroy')->name('contracts.destroy');
            Route::get('/contracts/create', 'create')->name('contracts.create');
        });
    });

    require __DIR__ . '/auth.php';
});
