<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::middleware(['auth', 'admin'])->group(function () {
    // ... autres routes d'administration ...

    // Afficher le formulaire de création
    Route::get('/admin/create', 'AdminController@showCreateForm')->name('admin.create_admin.form');

    // Gérer la création d'administrateurs
    Route::post('/admin/create', 'AdminController@createAdmin')->name('admin.create_admin');
});

Route::middleware(['role:admin'])->group(function () {
    // Les routes accessibles uniquement aux administrateurs
    Route::get('/admin/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
});

Route::middleware(['role:employee'])->group(function () {
    // Les routes accessibles uniquement aux employés
    Route::get('/employee/dashboard', 'EmployeeController@dashboard')->name('employee.dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
