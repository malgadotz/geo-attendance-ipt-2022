<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\ChangePasswordRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use Alphaolomi\Nida\Facades\Nida;


class UserProfileController extends Controller
{
    public function index()        
    {
                return view('auth.login');
    }
    public function changepassword()
    {
        return view('changepassword');
    }
    public function updatepassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            Alert::toast('That is not the current password','error');
            return back();
        }

        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        Alert::toast('Password changed','success');

        return back();

    }
    public function nida(Request $req)
    {
        $userData = Nida::getUserData($req->mesage);
        $nida=$userData['result'];
        return view('nida', ['model'=>$nida]);
    }
}
