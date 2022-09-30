<?php 
namespace App\Exports;
use App\Models\Staff;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
class StaffCourseExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Facades\Collection
     */

     public function collection(){
        // return teacher::all();
        $data = DB::table('staffcourse')
        ->select('teacher.staff_no as staffno','course.course_code as coursecode','program.program_code as program','staffcourse.year_level')
        ->leftjoin('teacher','teacher.id','staffcourse.staff_id')
        ->leftjoin('course','course.id','staffcourse.course_id')
        ->leftjoin('program','program.id','staffcourse.program_id')
        ->get();
        // $teachers = teacher::select('first_name','last_name','teacher_regno','year_level')->get();
        return $data;
     }

}


?>