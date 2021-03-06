<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\PageController;

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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin'], function () {
	Route::get('/users', [UsersController::class, 'index'])->name('admin.users.list');
	Route::get('/create-user', [UsersController::class, 'create'])->name('admin.create.user');
	Route::get('/edit-user/{id}', [UsersController::class, 'edit'])->name('admin.edit.user');
	Route::post('/store-user', [UsersController::class, 'store'])->name('admin.store.user');
	Route::post('/update-user', [UsersController::class, 'update'])->name('admin.update.user');
});

Route::any('{catchall}', [PageController::class, 'index'])->where('catchall', '.*');
