<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    // public function masuk(Request $request){
    //     $this->validate($request, [
    //       'email' => 'required|email',
    //       'password' => 'required|min:6'
    //     ]);
    //     $credentials = [
    //         'email' => $request['email'],
    //         'password' => $request['password'],
    //     ];
    //     if (Auth::attempt($credentials)) {
    //         if (Auth::user()->role=='userraw') {
    //             return redirect('dasboard');
    //         }else if(Auth::user()->role=='adminraw'){
    //             return redirect('')
    //         }else{
    //             return redirect()->back();
    //         }
    //     }else {
    //         echo "kondisi 2";
    //         //return redirect()->back();
    //     }
    // }
    
}
