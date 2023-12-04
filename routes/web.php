<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\FuncCall;

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

Route::get('/', [IndexController::class , "index"]);

Route::resource('test', TestController::class);

Route::controller(VideoController::class)->name('videos.')->group(function (){
    Route::get('/videos' , 'index')->name('index');
});