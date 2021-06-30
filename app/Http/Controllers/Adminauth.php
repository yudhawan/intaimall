<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\Mimin;
class Adminauth extends Controller
{
    public function showlogin(){
        return view('auth.login');
    }

    public function login(Request $request){

          // Validate the form data
        $this->validate($request, [
          'email' => 'required|email',
          'password' => 'required|min:6'
        ]);
        $credential = ([
            'email'=>$request['email'],
            'password'=>$request['password']
        ]);
        
        if(Auth::guard('mimin')->attempt($credential)){
            return redirect('dasboard');
        } 
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

}
