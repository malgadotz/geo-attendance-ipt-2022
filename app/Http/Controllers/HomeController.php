<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
        public function index()        
        {
            if(  Auth()->user()->role == 'Admin') {
                return redirect()->route('admin.dashboard');
            }elseif( Auth()->user()->role == 'Staff') {
                return redirect()->route('staff.dashboard');
            }elseif(Auth()->user()->role == 'Student') {
                return redirect()->route('student.dashboard');
            }
            else{
                return view('auth.login');
            }
    }

}

