<?php 
namespace App\Exports;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
class StudentExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Facades\Collection
     */

     public function collection(){
        // return Student::all();
        $data =DB::table('student')
        ->select('student.first_name','student.last_name','student.student_regno','student.year_level', 'program.program_code as program','users.email as email')
        // ->leftjoin('course','course.id','student.course_id')
        ->leftjoin('program','program.id','student.program_id')
        ->leftjoin('users','users.id','student.userid')
        ->get();
        // $students = Student::select('first_name','last_name','student_regno','year_level')->get();
        return $data;
     }

}


?>