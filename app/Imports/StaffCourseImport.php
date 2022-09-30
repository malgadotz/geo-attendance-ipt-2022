<?php 
namespace App\Imports;
use App\Models\Course;
use App\Models\Program;
use App\Models\Staff;
use App\Models\StaffCourse;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Facades\Excel;
class StaffCourseImport implements ToModel
{
    /**
     * @return \Illuminate\Support\Facades\Collection
     */

     public function model(array $model)
     {
     
      $staff=Staff::where('staff_no', $model[0])->get();
      $course=Course::where('course_code', $model[1])->get();
      $program=Program::where('program_code', $model[2])->get();

    
      
      
      foreach($course as $course)
      foreach($program as $program)
      foreach($staff as $staff)
      StaffCourse::create(
       [
        'course_id'=>'2',
        'staff_id'=>$staff->id,
           'program_id'=>$program->id,
          
           'year_level'=>$model[3]
       ]
      ); 

      
     }

}


?>