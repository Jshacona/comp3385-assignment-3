<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------|
| Web Routes                                                                |
|--------------------------------------------------------------------------|
| Here is where you can register web routes for your application. These    |
| routes are loaded by the RouteServiceProvider and all of them will be    |
| assigned to the "web" middleware group. Make something great!             |
|--------------------------------------------------------------------------|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

// Login Routes
Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store']);

// Dashboard route with authentication middleware
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// Client routes with authentication middleware
Route::get('/clients/add', [ClientController::class, 'create'])->name('clients.add')->middleware('auth');
Route::post('/clients', [ClientController::class, 'store'])->middleware('auth');


