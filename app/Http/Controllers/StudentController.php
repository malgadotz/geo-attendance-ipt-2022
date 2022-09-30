<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\Program;
use App\Models\User;
use App\Models\Staff;
use App\Http\Requests\StudentRequest;
use App\Exports\StudentExport;
use App\Imports\StudentImport;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Facades\Excel;
use Twilio\Rest\Client;
class StudentController extends Controller
{
    public function index()        
    {  
       if(Auth()->user()->role == 'Student') {

        $id=Auth()->user()->id;    
        $model = Student::where('userid', $id)->get();
            return view('student', ['student'=>$model]);
        }
        else{
            return view('auth.login');
        }
}
public function view()
{
    $model = DB::table('student')
    ->select('student.*','program.program_code as program','users.email as email')
    ->leftjoin('program','program.id','student.program_id')
    ->leftjoin('users','users.id','student.userid')
    ->orderBy('program_id', 'asc')
    ->orderBy('year_level', 'asc')
    ->get();
    return view('studentview', ['model'=>$model]);
}

public function viewstaff()
{
   
        $staff = Staff::where('userid', Auth()->user()->id)->get();
        foreach($staff as $staff){
        $model=DB::table('staffcourse')
        ->select('staffcourse.*','teacher.first_name as name','teacher.last_name as name2','course.course_code as coursecode','course.course_name as coursename','program.program_code as program')
        ->leftjoin('teacher','teacher.id','staffcourse.staff_id')
        ->leftjoin('course','course.id','staffcourse.course_id')
        ->leftjoin('program','program.id','staffcourse.program_id')
        ->where('staffcourse.staff_id',$staff->id)
        ->orderBy('program_id', 'asc')
        ->orderBy('year_level', 'asc')
        ->get();   
    return view('studentviewstaff', ['mode'=>$model]);

}  

  }


public function add()
{
    $program=Program::all();
    return view('studentadd', ['program'=> $program]);
}

public function store(StudentRequest $request)        
{
    $model = $request->validated();
       $user=User::create(
        [
            'name'=>$model['first_name'].' '.$model['last_name'],
            'username'=>$model['student_regno'],
            'role'=>'Student',
            'email'=>$model['last_name'].$model['first_name'].'@gmail.com',
            'password'=>Hash::make($model['last_name']),
        ]
       ); 
       Student::create(
        [
            'first_name'=>$model['first_name'],
            'last_name'=>$model['last_name'],
            'year_level'=>$model['year_level'],
            'student_regno'=>$model['student_regno'],
            'finger_template'=>$model['student_regno'],
            'program_id'=>$model['program_id'],
            'userid'=>$user['id'],
        ]
       ); 
       Alert::toast('Student created, Username:RegNO, Password:Last Name', 'success');
       return redirect('admin/student/view');
}

public function delete($id)
{
    $model=Student::find($id);
    $user = User::find($model->userid);
    
    if($model->delete() && $user->delete())
    Alert::toast('Student Deleted Succesfully ','success');
    
       return redirect('admin/studenT/view');
}
public function edit($id)
{
    $model = Student::find($id);
    $user = User::find($model->userid);
    $program=Program::all();
    return view('studentedit', ['model'=>$model,'user'=>$user,'program'=>$program]);
}

public function update(Request $req)
{
    // $data = $req->validated();
    $model = Student::find($req->sid);
    $user = User::find($req->uid);
    $user->email=$req->last_name.$req->first_name.'@gmail.com';
    $user->name=$req->first_name.' '.$req->last_name;
    $user->username=$req->student_regno;
    $model->student_regno=$req->student_regno;
    $model->first_name=$req->first_name;
    $model->last_name=$req->last_name;
    if($model->save() && $user->save())
    Alert::toast('Student Updated Succesfully ','success');
       return redirect('admin/student/view');
}
public function exportstudent()
{
    return Excel::download(new StudentExport, 'students.xlsx');
}
public function importstudent()
{
       Excel::Import(new StudentImport, request()->file('file'));
       Alert::toast('Student Imported, Username:RegNO, Password:Last Name', 'success');
       return redirect('admin/student/view'); 
}
public function import()
{
    return view('studentimport');
}

public function qr()
{
    return view('scan');
}
}
