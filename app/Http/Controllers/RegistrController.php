<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\User;
use Illuminate\Suport\Facades\Auth;

class RegistrController extends Controller
{
    public function save(Request $request){
        if(Auth::check()){
            return redirect(route('user.private'));
        }
        $validateFields =$request->validate([
            'phone' => 'required|numerick|between:11,11',
            'password' => 'required|confirmed:repeatpassword',
            'email' => 'email',
            'name' => 'required|min:3',
        ]);
        $user = User::create($validateFields);
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
