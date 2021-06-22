<?php

use Illuminate\Support\Facades\Route;

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
    return "<center><h1>Oi Fatec Araras</h1></center>";
});
Route::get('/laravel', function () {
    return view('welcome');
});
Route::get('/Orlando', function () {
    return "<center><h1>Melhor professor</h1></center>";
});

Route::prefix('/app')->group(function (){
    Route::get('/', function (){
        return 'View App Index';
    })->name('app');
    Route::get('/user', function (){
        return 'View App User';
    })->name('app.user');;
    Route::get('/profile', function (){
        return view('profile');
    })->name('app.profile') ;;
});  

Route::redirect('bla', '/app', 301);

use App\Http\Controllers\TaskController;
Route::get('/1', [TaskController::class, 'home']);
Route::get('/2', [TaskController::class, 'home2']);

use App\Http\Controllers\FlorController;
Route::resource('flor', FlorController::class);
