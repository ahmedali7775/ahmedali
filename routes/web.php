<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
    return view('admin.add_user');
});

Route::resource('user', UserController::class);

Route::get('/admin/add_user', [UserController::class, 'add_user'])->name('add_user');

Route::get('/admin/view_user', [UserController::class, 'view_user'])->name('view_user');

Route::get('user_edit/{id}', [UserController::class, 'user_edit']);

Route::put('update_user/{id}', [UserController::class, 'update_user']);

Route::post('multipleusersdelete', [UserController::class, 'multipleusersdelete']);


