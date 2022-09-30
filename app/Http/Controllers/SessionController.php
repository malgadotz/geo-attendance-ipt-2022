<?php

namespace App\Http\Controllers;
use App\Models\Session;
use App\Models\StaffCourse;
use App\Models\Staff;
use App\Models\Course;
use App\Models\Student;
use App\Models\Venue;
use App\Models\Program;
use App\Http\Requests\SessionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Twilio\Rest\Client;
class SessionController extends Controller
{
    public function view()
    {
        $model = DB::table('session')
        ->select('session.*','venue.code as venue', 'course.course_name as course','course.course_code as code', 'venue.identifier as token','program.program_code as program')
        ->leftjoin('venue', 'venue.id', 'session.venueid')
        ->leftjoin('course','course.id','session.course_id')
        ->leftjoin('program','program.id','session.program_id')
        ->get();
        $total=$model->count();
        return view('sessionview', ['model'=>$model, 'total'=>$total]);
    }
    public function sessionview()
    {
        $model = DB::table('session')
        ->select('session.*','venue.code as venue', 'course.course_code as code', 'course.course_name as course','teacher.first_name as first','teacher.last_name as last', 'venue.identifier as token','program.program_code as program')
        ->leftjoin('venue', 'venue.id', 'session.venueid')
        ->leftjoin('course','course.id','session.course_id')
        ->leftjoin('program','program.id','session.program_id')
        ->leftjoin('teacher','teacher.id','session.staff_id')
        ->get();
        $id = Auth()->user()->id;
        $student = Student::where('userid',$id)->get();
        foreach($student as $student){
        $course = Session::where('program_id',$student->program_id)->get();
        $courseCount = $course->count();
        $program=$student->program_id;
        $year=$student->year_level;
        return view('sessionviewstudent', ['model'=>$model,'program'=>$program,'yos'=>$year,'count'=>$courseCount]);
    }
    }

    public function staffview()
    {
        
        $model = DB::table('session')
        ->select('session.*','venue.code as venue', 'course.course_code as code','course.course_name as course', 'venue.identifier as token','program.program_code as program')
        ->leftjoin('venue', 'venue.id', 'session.venueid')
        ->leftjoin('course','course.id','session.course_id')
        ->leftjoin('program','program.id','session.program_id')
        // ->where('course_id')
        ->get();
        $id = Auth()->user()->id;
        $staff = Staff::where('userid',$id)->get();
        foreach($staff as $staff){
        $course = StaffCourse::where('staff_id',$staff->id)->get();
        $program=1;
        return view('sessionviewstaff', ['model'=>$model,'program'=>$program]);
    }
    }
    public function add()
    {

        $venue = Venue::all();
         $id = Auth()->user()->id;
        $staffs = Staff::where('userid',$id)->get();
        foreach($staffs as $staffs){
        $course = StaffCourse::where('staff_id',$staffs->id)->get();
        $program = Program::all();
        $staff=Staff::where('userid',Auth()->user()->id)->get();
        return view('sessionadd', ['course'=>$course, 'venue'=>$venue, 'staff'=>$staff,'program'=>$program]);
        }
    }
    
    public function create(SessionRequest $request)
    {
        $data = $request->validated();
        $sessions = Session::all();
        foreach($sessions as $sessions)
        {
        if($sessions->course_id == $data['course_id'] && $sessions->program_id == $data['program_id'] && $sessions->date == $data['date'] && $sessions->staff_id == $data['staff_id'] && $sessions->start_time == $data['start_time'] )
        {
            Alert::toast('You already have Session at this time', 'error');
            return redirect()->back();
        }
        else if( $sessions->venueid == $data['venueid'] && $sessions->date == $data['date'] && $sessions->staff_id == $data['staff_id'] && $sessions->start_time == $data['start_time'] )
        {
            Alert::toast('Venue assigned to another Session at this time', 'error');
            return redirect()->back();
        }
        else if( $sessions->program_id == $data['program_id'] && $sessions->year_level == $data['year_level'] && $sessions->date == $data['date'] && $sessions->start_time == $data['start_time'] )
        {
            Alert::toast('Programme has been assigned to another Session at this time.', 'error');
            return redirect()->back();
        }
    }
        $model= new Session;

        $model->activity_name=$data['activity_name'];
        $model->venueid=$data['venueid'];
        $model->course_id=$data['course_id'];
        $model->program_id=$data['program_id'];
        $model->staff_id=$data['staff_id'];
        $model->date=$data['date'];
        $model->year_level=$data['year_level'];
        $model->start_time=$data['start_time'];
        $model->end_time=$data['end_time'];
        $kipindi = Course::find($data['course_id'])->course_code;
        
        if($model->save())
        {
            try
            {
                $sid  = env('TWILIO_SID_2'); 
                $token  = env('TWILIO_TOKEN_2'); 
                $from= env('TWILIO_FROM_2');
                $msid= env('TWILIO_SMSID');
            
                $twilio = new Client($sid, $token); 
            
                $message = $twilio->messages 
                                ->create("+255756604750",[
                    "from" =>$from,
                    // "messagingServiceSid" => "MGc539243b011d9f388ecf0c74a1feb8c5",
                    'body'=>'Session Scheduled For: '.$kipindi.' ['.$data['activity_name'].'] on '.$data['date'].' '.$data['start_time']. ' - '.$data['end_time']
                ]);
                Alert::toast('Session Scheduled For: '.$kipindi.' ['.$data['activity_name'].'] on '.$data['date'].' '.$data['start_time'], 'success');
                // return redirect('student/dashboard');
            
            }
            catch(\Exception $ex)
            {
                Alert::toast($ex->getMessage(),'error');
                // return redirect('student/dashboard');
            }
        }
        else
        {
            Alert::toast('Session Could not be added!!!','error');

        }
        return redirect('staff/session/view');
    }
    public function delete($id)
    {
        $model=Session::find($id);
        $model->delete();
        Alert::toast('Session Deleted', 'success');
        return redirect('staff/session/view');
    }
    public function edit($id)
    {
        $model = Session::find($id);
        $venue=Venue::find($model->venueid);
        $program=Program::find($model->program_id);
        $course=Course::find($model->course_id);
        $id = Auth()->user()->id;
       
        $staffs = Staff::where('userid',$id)->get();
        foreach($staffs as $staffs){
        $courses = StaffCourse::where('staff_id',$staffs->id)->get();
        $programs = Program::all();
        $staff=Staff::where('userid',Auth()->user()->id)->get();
        
        $venues=Venue::all();
        
        return view('sessionedit', ['model'=>$model,'course'=>$course,'program'=>$program,'venue'=>$venue, 'courses'=>$courses,'programs'=>$programs,'venues'=>$venues]);
    }}

    public function update(Request $data)
    {
        //  = $request->validated();
        $model=Session::find($data->snid);

        $model->activity_name=$data->activity_name;
        $model->venueid=$data['venueid'];
        $model->course_id=$data['course_id'];
        $model->program_id=$data['program_id'];
        $model->year_level=$data['year_level'];
        $model->date=$data['date'];
        $model->start_time=$data['start_time'];
        $model->end_time=$data['end_time'];
        $model->save();
        Alert::toast('Session Updated', 'success');
        return redirect('staff/session/view');
    }
}
