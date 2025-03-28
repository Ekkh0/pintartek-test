<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\FormController;

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

Route::get('/login', [SessionController::class, 'index'])->name('login');
Route::get('/register', [SessionController::class, 'register'])->name('register');
Route::post('sessionLogin', [SessionController::class, 'login'])->name('sessionLogin');
Route::post('createAccount', [SessionController::class, 'create'])->name('createAccount');
Route::get('/logout', [SessionController::class, 'logout'])->name('logout');

Route::get('/', [MainController::class, 'index'])->middleware('auth')->name('mainView');
Route::delete('/delete/{cardioEntry}', [MainController::class, 'delete'])->middleware('auth')->name('deleteEntry');
Route::get('/create', [FormController::class, 'index'])->middleware('auth')->name('createView');
Route::post('/create', [FormController::class, 'create'])->middleware('auth')->name('createEntry');
Route::get('/edit/{cardioEntry}', [FormController::class, 'edit'])->middleware('auth')->name('editView');
Route::put('/edit/{cardioEntry}', [FormController::class, 'update'])->middleware('auth')->name('updateEntry');