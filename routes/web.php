<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\Auth\PermissionController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    // 'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('tasks', \App\Http\Controllers\TaskController::class);
    // route for permission
    Route::get('/permission/list',[PermissionController::class,'index']);
    Route::get('/permission/add',[PermissionController::class,'add']);
    Route::post('/permission/store',[PermissionController::class,'store']);
    Route::get('/permission/edit',[PermissionController::class,'edit']);
    Route::post('/permission/update',[PermissionController::class,'update']);
    Route::post('/permission/delete',[PermissionController::class,'delete']);
});
