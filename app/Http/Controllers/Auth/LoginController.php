<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    // protected function redirectTo (){
    //     if(Auth()->user()->role == 'Student')
    //     {
    //         return route('student.dashboard') ;

    //     }
    //     elseif(Auth()->user()->role == 'Staff')
    //     {
    //         return route('staff.dashboard') ;
    //     }
    //     else
    //     {
    //         return route('admin.dashboard') ;

    //     }

    // }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // public function login(Request $request)
    // {
    //     $input= $request->all();
    //     $this->validate($request,[
    //         'email'=>'required',
    //         'password'=>'required'
    //     ]);

    //     if( Auth()->attempt(array('username'=>$input['email'],'password'=>$input['password']))){

    //         if(  Auth()->user()->role == 'Admin') {
    //             return redirect()->route('admin.dashboard');
    //         }elseif(  Auth()->user()->role == 'Staff') {
    //             return redirect()->route('staff.dashboard');
    //         }elseif( Auth()->user()->role == 'Student') {
    //             return redirect()->route('student.dashboard');
    //         }
    //         else{
    //             return redirect()->route('home');
    //         }
    //     }
    // }
}
