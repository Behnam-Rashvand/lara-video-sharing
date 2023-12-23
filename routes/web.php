<?php

use PhpParser\Node\Expr\FuncCall;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\CategoryVideoController;
use App\Http\Controllers\CommentController;

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

Route::get('categories/{category:slug}/videos' , [CategoryVideoController::class , "index"])->name('categories.videos.index');

Route::post('videos/{video}/comments' , [CommentController::class , "store"])->name('comments.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';