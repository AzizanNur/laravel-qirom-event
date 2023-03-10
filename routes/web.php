<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardEventController;
use App\Http\Controllers\UserRegistrationsController;
use App\Http\Controllers\DashboardUserRegistrationController;
use App\Http\Controllers\DetailController;
use App\Models\Events;

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

Route::get('/', [HomepageController::class, 'index']);
Route::get("/detail/{post:slug}", [DetailController::class, 'show']);

Route::get('/detail', function () {
    return view('detail');
});

Route::get('/success', function () {
    return view('success_page');
});

Route::get('/home', function () {
    return redirect()->intended('/dashboard');
});

Route::resource('registration', UserRegistrationsController::class);

//admin
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest'); //only guest can access
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest'); //only guest can access
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');//only user already login

Route::resource('/dashboard/user_registration', DashboardUserRegistrationController::class)->middleware('auth');
Route::resource('/dashboard/events', DashboardEventController::class)->middleware('auth');
Route::get('/dashboard/events/checkSlug', [DashboardUserRegistrationController::class, 'checkSlug'])->middleware('auth');

// Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');
