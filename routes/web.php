<?php

use App\Test;
use App\container;
use App\TestSystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/', function (){

    dd(config('aprogrammer.create'));
    // $test = new Test('Junior');
    // dd($test->smth(),TestSystem::smth());
    // dd(TestSystem::smth());
});


//Route::get('/posts',[\App\Http\Controllers\PostController::class,'index'])->name('posts.index');

Route::resource('posts',\App\Http\Controllers\PostController::class);

Route::get('customLogout',[PostController::class,'logout'])->name('customLogout');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
