<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\ChangePasswordRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StaffRequest;
use App\Models\Staff;
use App\Exports\StaffExport;
use App\Imports\StaffImport;
use Maatwebsite\Excel\Facades\Excel;

// // use Illuminate\Support\Facades\Hash;
// use App\Models\Student;
// use App\Models\Program;


class AdminController extends Controller
{
    public function index()        
        {
            if(  Auth()->user()->role == 'Admin') {
                return view('admin');
            }
            else
            {
                return view('auth.login');
            }

    }
    
    public function add()
    {
        return view('auth.register');
    }
    
    public function create(StaffRequest $request)        
    {
        $model = $request->validated();
           $user= User::create(
            [
                'name'=>$model['first_name'].' '.$model['last_name'],
                'username'=>$model['mobile'],
                'role'=>'Admin',
                'email'=>$model['email'],
                'password'=>Hash::make($model['last_name']),
            ]
           );
          $staff =  Staff::create(
            [
                'first_name'=>$model['first_name'],
                'last_name'=>$model['last_name'],
                'staff_no'=>'T/UDOM/STAFF/00'.$user['id'],
                'mobile'=>$model['mobile'],
                'userid'=>$user['id'],
            ]
           ); 
           $firstday = date('2 - d/m/Y', strtotime("this week"));
    
            Alert::toast('Staff Registered Succesfully '.$staff['staff_no'],'success');

           return redirect('admin/staff/view');

    }
    public function delete($id)
    {
        $model=Staff::find($id);
        $user = User::find($model->userid);
        
        if($model->delete() && $user->delete())
        Alert::toast('Staff Deleted Succesfully ','success');
        
           return redirect('admin/staff/view');
    }
    public function edit($id)
    {
        $model = Staff::find($id);
        $user = User::find($model->userid);
        return view('staffedit', ['model'=>$model,'user'=>$user]);
    }
    
    public function update(Request $req)
    {
        // $data = $req->validated();
        $model = Staff::find($req->sid);
        $user = User::find($req->uid);
        $user->email=$req->email;
        $user->name=$req->first_name.' '.$req->last_name;
        $model->mobile=$req->mobile;
        $model->first_name=$req->first_name;
        $model->last_name=$req->last_name;
        if($model->save() && $user->save())
        Alert::toast('Staff Updated Succesfully ','success');
        
        return redirect('admin/staff/view');

    }

    public function changepassword($id)
    {
        
        return view('changepassword');
    }
    public function updatepassword(Request $request)
    {
        $request->validate([
            'uid'=>'required',
            'new_password_confirmation' => 'required',
            'new_password' => 'required|confirmed',
        ]);
        $user = User::find($request->uid);

        

        #Update the new Password
        $user->update([
            'password' => Hash::make($request->new_password)
        ]);
        Alert::toast('Password changed','success');

        return back();

    }
}
