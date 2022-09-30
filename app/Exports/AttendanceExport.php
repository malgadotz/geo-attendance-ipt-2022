<?php 
namespace App\Exports;
use App\Models\Staff;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
class AttendanceExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Facades\Collection
     */

     public function collection(){
        // return Student::all();
        $data=Staff::where('userid',Auth()->user()->id)->get();
        foreach($data as $data)
        $attendance = DB::table('attendance')
        ->select('student.first_name as first_name','student.last_name as last_name'
        ,'student.student_regno as regno', 'course.course_code as subject', 'course.course_name as somo',
         'session.date as date','attendance.status')
        ->leftjoin('session', 'session.id', 'attendance.activity_id')
        ->leftjoin('course','course.id','attendance.course_id')
        ->leftjoin('student','student.id','attendance.student_id')
        ->where('attendance.staff_id',$data->id)
        ->get();
     
        // $students = Student::select('first_name','last_name','student_regno','year_level')->get();
        return $attendance;
     }

}


?>