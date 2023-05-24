<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PublisherController;
use App\Http\Middleware\AgeCheck;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

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
Route::prefix('cms/admin')->middleware('guest:admin,user')->group(function(){
    Route::get('login',[AuthController::class , 'showLoginView' ])->name('cms.login');
    Route::post('login', [AuthController::class, 'login']);
});

Route::prefix('cms/admin')->middleware('auth:admin,user')->group( function(){
    Route::view('/', 'cms.template');
    Route::resource('books',BookController::class);
    Route::resource('publishers', PublisherController::class);
    Route::resource('admins', AdminController::class);
    Route::get('logout',[AuthController::class , 'logout'])->name('cms.logout');
});

// Route::get('news',function(){
//     echo 'News content will appere here!';
//     // dd(111);
// })->Middleware(AgeCheck::class);
