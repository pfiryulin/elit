<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $login = $request->query('login');
        $pass = $request->query('password');
        if($login != '' && $pass != ''){
            $user = User::query();
            $user = $user->where('phoneNumber', '=', $login);
            return $user->get()->toJson();
        }else{
            return json_encode(['hello'],JSON_UNESCAPED_UNICODE);
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = new User();
        $user->name = 'Семен Семенович Крузенштурн';
        $user->email = 'exemple@exemp.org';
        $user->password = '12345';
        $user->phoneNumber = '89025113113';
        $user->save();

    }

    /**
     * Look for user
     */
    public function lookfor(Request $request){
        $login = $request->query('login');
        $pass = $request->query('password');
        if($login != '' && $pass != ''){
            $user = User::query();
            $user = $user->where('phoneNumber', '=', $login);
            return $user->get()->toJson();
        }else{
            return json_encode(['hello'],JSON_UNESCAPED_UNICODE);
        }

    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
