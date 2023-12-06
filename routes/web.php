<?php

use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\VideoController;

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

Route::get('/', [IndexController::class, "index"])->name('home');

Route::resource('test', TestController::class);

Route::controller(VideoController::class)->prefix('videos')->name('videos.')->group(function () {

    Route::get('/', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::post('/' , 'store')->name('store');
    Route::get('{video}' , 'show')->name('show');
    Route::get('{video}/edit' , 'edit')->name('edit');
    Route::post('{video}' , 'update')->name('update');
});
