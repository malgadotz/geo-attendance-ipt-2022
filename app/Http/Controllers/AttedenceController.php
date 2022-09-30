<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;
use App\Models\StudentCourse;
use App\Models\StaffCourse;
use App\Models\Staff;
use App\Models\User;
use App\Models\Session;
use App\Models\Geotable;
use App\Exports\AttendanceExport;
use App\Models\Attendance;
use App\Models\Course;
use App\Http\Requests\AttendanceRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Facades\Excel;
use Twilio\Rest\Client;


use Illuminate\Support\Facades\DB;

class AttedenceController extends Controller
{
    public function attendanceview()
    {
        $sha = DB::table('attendance')
        ->select('attendance.*','student.first_name as first_name','student.last_name as last_name','student.student_regno as regno', 'course.course_code as subject', 'session.date as date')
        ->leftjoin('session', 'session.id', 'attendance.activity_id')
        ->leftjoin('course','course.id','attendance.course_id')
        ->leftjoin('student','student.id','attendance.student_id')
        ->get();
        
        $student = Student::where('userid',Auth()->user()->id)->get();
       foreach($student as $student)
        $attendance=Attendance::where('student_id', $student->id)->get();
        // $venue = Venue::where('id', $model->venueid)->code;
        return view('attendenceviewstudent', ['model'=>$attendance]);
    }
    public function attendanceviewstaff()
    {
       foreach( Staff::where('userid', Auth()->user()->id)->get() as $staff)
      
       $attendance = DB::table('attendance')
       ->select('attendance.*','student.first_name as first_name','student.last_name as last_name','student.student_regno as regno', 'course.course_code as code', 'course.course_name as subject',  'session.date as date')
       ->leftjoin('session', 'session.id', 'attendance.activity_id')
       ->leftjoin('course','course.id','attendance.course_id')
       ->leftjoin('student','student.id','attendance.student_id')
       ->where('session.staff_id', $staff->id)
       ->get();
       return view('attendenceview', ['model'=>$attendance]);
        // $staffcourse=Attendance::->get();
        // $venue = Venue::where('id', $model->venueid)->code;
    //    return view('attendenceviewstaff',['model'=>$staffcourse]);
    }
    public function view()
    {
        $attendance = DB::table('attendance')
        ->select('attendance.*','student.first_name as first_name','student.last_name as last_name','student.student_regno as regno', 'course.course_code as code', 'course.course_name as subject', 'session.date as date')
        ->leftjoin('session', 'session.id', 'attendance.activity_id')
        ->leftjoin('course','course.id','attendance.course_id')
        ->leftjoin('student','student.id','attendance.student_id')
        ->get();
        return view('attendenceview', ['model'=>$attendance]);
    }
    public function add($id)
    {
        $student = Student::where('userid',Auth()->user()->id)->get();
        $activity = Session::find($id);
        $coordinates = Geotable::find($activity->venue_id);
        $course = Course::find($activity->course_id);

        return view('attendenceadd', ['model'=>$activity, 'student'=>$student,'course'=>$course,'coordinates'=>$coordinates]);
    }
        public function store(AttendanceRequest $request)
    {
        $data = $request->validated();
        $model= new Attendance;
        $attendence= Attendance :: all();
        foreach($attendence as $attendence)
            if($attendence->student_id == $data['student_id'] &&
            $attendence->activity_id == $data['activity_id']) 
            {
                Alert::toast('You have already appeared in the Attendance Sheet', 'error');
        return redirect('student/attendence/view');
            }        
        $model->activity_id=$data['activity_id'];
        $model->student_id=$data['student_id'];
        $model->course_id=$data['course_id'];
        $model->staff_id=$data['staff_id'];
        $model->status='present';
        $model->save();

       $student = Student::find($data['student_id'])->student_regno;
       $course = Course::find($data['course_id'])->course_code; 
        try{
            $sid  = env('TWILIO_SID_2'); 
            $token  = env('TWILIO_TOKEN_2'); 
            $from= env('TWILIO_FROM_2');
            $msid= env('TWILIO_SMSID');
        
            $twilio = new Client($sid, $token); 
            
            $message = $twilio->messages 
                              ->create("+255756604750",[
                                
                "from" =>$from,
                // "messagingServiceSid" => "MGc539243b011d9f388ecf0c74a1feb8c5",
                'body'=>'Attendance taken By : '.$student.' ['.$course.'] on '.$model->created_at
            ]);
            Alert::toast('Attendance taken By : '.$student.' ['.$course.'] on '.$model->created_at, 'success');
            // return redirect('student/dashboard');
        }
        catch(\Exception $ex)
        {
        
            Alert::toast($ex->getMessage(),'error');
            // return redirect('student/dashboard');
        }
        // Alert::toast('Attendance added Succesfully','success');
        return redirect('student/attendence/view');
    }  
    public function exportstaff()
    {
        return Excel::download(new AttendanceExport, 'studentsattendence.xlsx');
    }  
}
