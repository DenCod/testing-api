<?php

use App\Http\Controllers\DataApiController;
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

Route::get('/', [DataApiController::class, 'dashboard']);
Route::get('/management-data', [DataApiController::class, 'managementData']);
Route::get('/add-data', [DataApiController::class, 'addData']);
Route::post('/save-data', [DataApiController::class, 'saveData']);
Route::get('/edit-data/{id}', [DataApiController::class, 'editData']);
Route::post('/update-data', [DataApiController::class, 'updateData']);
Route::delete('/delete-data/{id}', [DataApiController::class, 'deleteData']);
