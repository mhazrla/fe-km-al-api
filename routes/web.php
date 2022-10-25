<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CustomAuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('login', [CustomAuthController::class, 'login']);
Route::post('logout', [CustomAuthController::class, 'logout'])->name('logout');


Route::prefix('/')->controller(\App\Http\Controllers\HomeController::class)->group(function () {
    Route::redirect('/', '/home');
    Route::get('home', 'index')->name('home');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::get('{id}/edit', 'edit')->name('edit');
    Route::post('update/{per_id}', 'update')->name('update');
    Route::delete('destroy/{id}', 'destroy')->name('destroy');
    Route::get('{id}/detail', 'show')->name('show');
    Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});
