<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//rutas de usuario

Route::prefix('api')->group(function () {

    //tendran prefijo /api

    Route::get('users',function(){

        return "nombre de usuario";
    });

});

Route::prefix('api')->group(function () {

    Route::get('get_users',[App\Http\Controllers\UserController::class,'getUsers']);
    Route::get('list_users',[App\Http\Controllers\UserController::class,'listUsers']);
    Route::get('list_users_from_db',[App\Http\Controllers\UserController::class,'listUsersFromdb']);
    Route::get('list_users_from_dbigs',[App\Http\Controllers\UserController::class,'listUsersFromdbigs']);
    Route::get('listUsersFromdbWinthParams',[App\Http\Controllers\UserController::class,'listUsersFromdbWinthParams']);

    });


});
