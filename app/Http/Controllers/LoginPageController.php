<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginPageController extends Controller
{
    public function showForm(){
        if(Auth::check()){
            return redirect(route('user.privat'));
        }else{
            return view('login');
        }
    }
}
