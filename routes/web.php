<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CorralController;
use App\Http\Controllers\AnimalController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('admin')->middleware(['auth'])->group(function(){

    // Corrals CRUD
    Route::get('/corrals', [CorralController::class, 'index'])->name('admin.corrals');
    Route::get('/corrals/{corral_id}/edit', [CorralController::class, 'index'])->name('admin.corrals.edit');
    Route::post('/corrals/{corral_id}', [CorralController::class, 'index'])->name('admin.corrals.update');
    Route::get('/corrals/create', [CorralController::class, 'create'])->name('admin.corrals.create');
    Route::post('/corrals', [CorralController::class, 'store'])->name('admin.corrals.store');

    // Animals CRUD
    Route::get('/animals/{animal_id}/edit', [AnimalController::class, 'index'])->name('admin.animals.edit');
    Route::post('/animals/{animal_id}', [AnimalController::class, 'index'])->name('admin.animals.update');
    Route::get('/animals/create', [AnimalController::class, 'create'])->name('admin.animals.create');
    Route::post('/animals', [AnimalController::class, 'store'])->name('admin.animals.store');
});

require __DIR__.'/auth.php';
