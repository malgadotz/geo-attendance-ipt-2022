<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StaffRequest;
use App\Models\User;
use App\Models\Staff;
use App\Exports\StaffExport;
use App\Imports\StaffImport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Twilio\Rest\Client;



class StaffController extends Controller
{
    public function index()        
        {
            if( Auth()->user()->role == 'Staff') {
                return view('home');
            }
            else{
                return view('auth.login');
            }

    }

    public function view()
    {
        $model = DB::table('teacher')
        ->select('teacher.*','users.email as email')
        ->leftjoin('users','users.id','teacher.userid')
        ->get();
        return view('staffview', ['model'=>$model]);
    }
    
    public function add()
    {
        return view('staffadd');
    }
    
    public function create(StaffRequest $request)        
    {
        $model = $request->validated();
           $user= User::create(
            [
                'name'=>$model['first_name'].' '.$model['last_name'],
                'username'=>$model['mobile'],
                'role'=>'Staff',
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
    
            Alert::toast('Staff Registered Succesfully '.$staff['staff_no'].$firstday,'success');

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
    public function exportstaff()
    {
        return Excel::download(new StaffExport, 'staffs.xlsx');
    }
    public function importstaff()
    {
        Excel::Import(new StaffImport, request()->file('file'));
           return redirect('admin/staff/view')->with('message','Staff created, Username:RegNO, Password:Last Name');
    }
    public function import()
    {
        return view('staffimport');
    }
    public function sms(Request $request)        
    {
        return view('twilio');
    }
    public function createsms(Request $request)        
    {
    
    try{
        $sid  = env('TWILIO_SID_2'); 
        $token  = env('TWILIO_TOKEN_2'); 
        $from= env('TWILIO_FROM_2');
        $msid= env('TWILIO_SMSID');

        $twilio = new Client($sid, $token); 
    
        $message = $twilio->messages 
                        ->create("+255".$request->number,[
                            
            "from" =>$from,
            // "messagingServiceSid" => "MGc539243b011d9f388ecf0c74a1feb8c5",
            'body'=>$request->mesage
        ]);
        Alert::toast('sent to:  0'.$request->number,'success');
        return redirect('staff/dashboard');

    }
    catch(\Exception $ex)
    {

        Alert::toast($ex->getMessage(),'error');
        return redirect('staff/dashboard');
    }
    }

    }
    