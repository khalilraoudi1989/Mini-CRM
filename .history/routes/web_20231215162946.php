<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\PasswordResetLinkController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

// Jetstream's login, registration, and other authentication-related routes
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->middleware('guest')
    ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

// ...

Route::middleware(['auth', 'checkRole:admin'])->group(function () {
    // Les routes accessibles uniquement aux administrateurs
    Route::get('/admin/dashboard', 'App\Http\Controllers\AdminController@dashboard')->name('admin.dashboard');
    Route::get('/admin/create', 'App\Http\Controllers\AdminController@create')->name('admin.create');
    Route::post('/admin/store', 'App\Http\Controllers\AdminController@store')->name('admin.store'); // Add this route
    Route::get('/company', 'App\Http\Controllers\CompanyController@index')->name('company.index');
    Route::get('/company/create', 'App\Http\Controllers\CompanyController@create')->name('company.create');
    Route::post('/company/store', 'App\Http\Controllers\CompanyController@store')->name('company.store');
    // Additional routes for edit and delete views
    Route::get('/company/{company}/edit', 'App\Http\Controllers\CompanyController@edit')->name('company.edit');
    Route::patch('company/{company}', 'App\Http\Controllers\CompanyController@update')->name('company.update');
    Route::get('/company/{company}/delete', 'App\Http\Controllers\CompanyController@delete')->name('company.delete');
    Route::delete('company/{company}', 'App\Http\Controllers\CompanyController@destroy')->name('company.destroy');
});

Route::middleware(['auth', 'checkRole:employee'])->group(function () {
    // Les routes accessibles uniquement aux employés
    Route::get('/employee/dashboard', 'App\Http\Controllers\EmployeeController@dashboard')->name('employee.dashboard');
});

Auth::routes();