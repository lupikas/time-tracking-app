<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

Route::get('/dashboard', [TaskController::class, 'index']);
Route::get('/create', [TaskController::class, 'create']);
Route::post('/create', [TaskController::class, 'store']);
Route::post('/export', [TaskController::class, 'export']);
Route::get('/logout', [TaskController::class, 'logout']);
