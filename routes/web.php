<?php

use App\Http\Controllers\EmailsController;
use Illuminate\Support\Facades\Route;

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


Route::get('/emails', [EmailsController::class, 'index'])->name('emails.index');
Route::post('/emails', [EmailsController::class, 'store'])->name('emails.store');
Route::get('/search', [EmailsController::class, 'search'])->name('emails.search');