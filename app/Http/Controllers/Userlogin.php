<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Auth;

class Userlogin extends Controller
{
    //
    public function login(Request $request){

    	$user = User::where('email', $request->email)->where('password', $request->password)->first();
    	Auth::login($user);
    	echo Auth::check();

        // $this->validate($request, [
        //   'email' => 'required|email',
        //   'password' => 'required'
        // ]);

        // if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
        //   return redirect()->back()->with('modal',true);
        // }

    }
}
