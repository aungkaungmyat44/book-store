<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('content-owners', [App\Http\Controllers\ContentOwnerController::class, 'index'])->name('content_owners');
    Route::get('publishers', [App\Http\Controllers\PublisherController::class, 'index'])->name('publishers');
    Route::resource('books', App\Http\Controllers\PublisherController::class);
});
