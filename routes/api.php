<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CrudUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class,'login']);
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
    Route::post('me', [AuthController::class,'me']);

});




Route::group([

    'middleware' => ['api','admin'],
    'prefix' => 'admin'

], function ($router) {

Route::get('/users', [CrudUserController::class, 'list']);
Route::post('/users/save', [CrudUserController::class, 'save']);

// Fsend useing json not form
Route::get('/users/find', [CrudUserController::class, 'find']);

// Delete a user
Route::delete('/users/delete', [CrudUserController::class, 'delete']);
});
