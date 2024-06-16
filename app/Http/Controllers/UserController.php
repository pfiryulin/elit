<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function chekUser(Request $request){

        $login = $request->get('login');
        $pass = $request->get('password');
        if($login != '' && $pass != ''){
            $user = User::query();
            $user = $user->where('phoneNumber', '=', $login);
            $a = $user->get()->password;
            // return json_encode([$user->get(), $a]);
            return $user->get()->toJson();
        }else{
            return json_encode(['hello'],JSON_UNESCAPED_UNICODE);
        }
        // $a = [$login, $pass];
        // return json_encode($a);
    }
}
