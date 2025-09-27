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

Route::get('/test', function () {
    return view('skillonnet');
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

    Route::get('/home', function () {
        return view('home', [
            'users' => null,
            'greeting' => __('messages.welcome')
        ]);
    })->name('home');

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
        Route::controller(ProfileController::class)->group(function(){

            Route::get('/profile/edit', 'edit')->name('profile.edit');
            Route::patch('/profile', 'update')->name('profile.update');
            Route::delete('/profile', 'destroy')->name('profile.destroy');
            Route::get('/addresses', 'index')->name('addresses.index');

        });


        Route::controller(SearchController::class)->group(function(){
            Route::post('/search', 'search')->name('search');
        });

        // customer routes
        Route::controller(CustomerController::class)->group(function () {
            // list customers
            Route::get('/customers', 'index')->name('customers.index');
            // show customer
            Route::get('/customers/{customer}', 'show')->name('customers.show');
            // show edit form
            Route::get('/customers/{customer}/edit', 'edit')->name('customers.edit');
            // update customer
            Route::patch('/customers/{id}', 'update')->name('customers.update');
            // delete customer
            Route::delete('/customers/{id}', 'destroy')->name('customers.destroy');
        });
    });

    require __DIR__ . '/auth.php';
});
