<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegistrController;
use App\Http\Controllers\LogoutController;

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

Route::get('/', function () {
    return view('login');
});
Route::post('user/check', [UserController::class, 'chekUser']);

Route::name('user.')->group(function(){
    Route::view('/privat', 'privat')->middleware('auth')->name('privat');
    Route::get('/login', function(){
        if(Auth::check()){
            return redirect(route('user.privet'));
        }
        return view('login');
    })->name('login');
    // Route::post('/login',[]);
    Route::get('/loguout', [LogoutController::class, 'logout'])->name('logout');

    Route::get('/registration',function(){
        return view('registration');
    })->name('registration');

    Route::post('/registration',[RegistrController::class, 'save']);
});
