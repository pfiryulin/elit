<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegistrController;

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
    return view('index');
});
Route::post('user/check', [UserController::class, 'chekUser']);

Route::name('user.')->group(function(){
    Route::view('/privet', 'privet')->middleware('auth')->name('privet');
    Route::get('/login', function(){
        if(Auth::check()){
            return redirect(route('user.privet'));
        }
        return view('login');
    })->name('login');
    // Route::post('/login',[]);
    // Route::get('/loguout', [])->name('logout);
    Route::get('/registration',function(){
        return view('registration');
    })->name('registration');
    Route::post('/registration',[RegistrController::class, 'save']);
});
