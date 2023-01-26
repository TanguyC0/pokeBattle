<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/aventure', [App\Http\Controllers\AventureController::class, 'index'])->name('aventure.index');
Route::get('/aventure/{stage?}', [App\Http\Controllers\AventureController::class, 'walk'])->name('aventure.walk');
Route::get('/aventure/catch/{id}/{idItem}', [App\Http\Controllers\AventureController::class, 'catch'])->name('aventure.catch');

Route::get('/bag/{type?}', [App\Http\Controllers\BagController::class, 'index'])->name('bag');
Route::get('/team', [App\Http\Controllers\TeamController::class, 'index'])->name('team');
Route::get('/box', [App\Http\Controllers\BoxController::class, 'index'])->name('box');

Route::get('/pokemon/{xp}/{id}', [App\Http\Controllers\PokemonController::class, 'xpUP'])->name('pokemon');

Route::middleware('adm')->group(function () {
    Route::get('/admin/aventure', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.aventure');
    Route::get('/admin/aventure/{id}', [App\Http\Controllers\AdminController::class, 'edit'])->name('admin.aventure.edit');
    Route::post('/admin/aventure/{id}', [App\Http\Controllers\AdminController::class, 'update'])->name('admin.aventure.update');
    Route::get('/admin/aventure/create', [App\Http\Controllers\AdminController::class, 'create'])->name('admin.aventure.create');
});

// ------------------------- dashboard and login (auto generate) -------------------------
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
