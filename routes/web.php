<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\LinksController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
// use   \bootstrap\app;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'active'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




// Route::get('/category/create', [CategoryController::class , 'show']);
// Route::post('/categories/create', [CategoryController::class , 'store']);

Route::middleware('auth')->group(function () {
    Route::resource('categories', CategoryController::class);
});


Route::middleware('auth')->group(function ()
{
    Route::resource('links', LinksController::class);

});

Route::middleware(['auth'])->group(function () {
    Route::get('/categories/{category}/links', [LinksController::class, 'index'])->name('categories.links.index');

    Route::get('/categories/{category}/links/create', [LinksController::class, 'create'])->name('categories.links.create');

    Route::post('/categories/{category}/links', [LinksController::class, 'store'])->name('categories.links.store');

    Route::get('/categories/{category}/links/{link}/edit', [LinksController::class, 'edit'])->name('categories.links.edit');

    Route::put('/categories/{category}/links/{link}', [LinksController::class, 'update'])->name('categories.links.update');

    Route::delete('/categories/{category}/links/{link}', [LinksController::class, 'destroy'])->name('categories.links.destroy');
});


require __DIR__.'/auth.php';
