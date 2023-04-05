<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\PlacesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('admin')->group(function () {
    Route::get('/users', [UsersController::class, 'index']);
    Route::get('/create', [UsersController::class, 'create'])->name('user.create');
    Route::post('/dashboard', [UsersController::class, 'store'])->name('user.store');
    Route::get('/delete/{id}', [UsersController::class, 'delete'])->name('user.delete');
    Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('user.edit');
    Route::put('/update/{id}', [UsersController::class, 'update'])->name('user.update');
    Route::get('/verif/{id}', [UsersController::class, 'verif'])->name('user.verif');


    Route::get('/places', [PlacesController::class, 'index'])->name('places');
    Route::get('/places/create', [PlacesController::class, 'create'])->name('place.create');
    Route::post('/places/create', [PlacesController::class, 'store'])->name('place.store');
    Route::get('/places/delete/{id}', [PlacesController::class, 'delete'])->name('place.delete');
    Route::get('/places/edit', [PlacesController::class, 'edit'])->name('place.edit');

    Route::get('/reservations', [ReservationsController::class, 'index'])->name('reservations');
    Route::get('/reservations/create', [ReservationsController::class, 'create'])->name('reservation.create');
    Route::post('/reservation/create', [ReservationsController::class, 'store'])->name('reservation.store');
    Route::get('/reservation/delete/{id}', [ReservationsController::class, 'delete'])->name('reservation.delete');
    Route::get('/reservation/edit/{id}', [ReservationsController::class, 'edit'])->name('reservation.edit');
    Route::put('/reservation/update/{id}', [ReservationsController::class, 'update'])->name('reservation.update');
});

Route::get('/dashboard', function () {
    return app()->make(UsersController::class)->callAction('index', []);
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
