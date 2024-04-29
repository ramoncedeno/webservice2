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
    // Route to get users
    Route::get('get_users',[App\Http\Controllers\UserController::class,'getUsers']);//->middleware('auth');

    // Route to list users
    Route::get('listofUsers',[App\Http\Controllers\UserController::class,'listofUsers']);//->middleware('auth');

    // Route to list users from the database
    Route::get('listUsersFromdb',[App\Http\Controllers\UserController::class,'listUsersFromdb']);//->middleware('auth');

    // Route to list users from a specific database (dbigs)
    Route::get('list_users_from_dbigs',[App\Http\Controllers\UserController::class,'listUsersFromdbigs']);//->middleware('auth');

    // Route to list users from the database with custom parameters
    Route::get('listUsersFromdbWinthParams',[App\Http\Controllers\UserController::class,'listUsersFromdbWinthParams']);//->middleware('auth');


    //probando rutas sin postman
    // Route to get users
    Route::get('testgetuser',[App\Http\Controllers\UserController::class,'testgetuser']);
    Route::get('testlistofUsers',[App\Http\Controllers\UserController::class,'testlistofUsers']);
    Route::get('testlistUsersFromdb',[App\Http\Controllers\UserController::class,'testlistUsersFromdb']);
});



