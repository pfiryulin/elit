<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Http\Models\User;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegistrController extends Controller
{
    public function save(Request $request){
        if(Auth::check()){
            return redirect(route('user.private'));
        }
        $user = User::create([
            'name' => $request->input('name'),
            'login' => $request->input('login'),
            'email' => $request->input('email'),
            'password'=> bcrypt($request->input('password')),
        ]);
        if($user){
            Auth::login($user);
            return redirect(route('user.private'));
        }else{
            return redirect(route('user.login'))->withError([
                'formError' => 'Что-то пошло не так.',
            ]);
        }
    }
}
