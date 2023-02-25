<?php

use App\Http\Controllers\UserRegistrationsController;
use App\Models\UsersRegistration;
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
    return view('homepage');
});

Route::get('/detail', function () {
    return view('detail');
});

Route::get('/success', function () {
    return view('success_page');
});

Route::resource('registration', UserRegistrationsController::class);
