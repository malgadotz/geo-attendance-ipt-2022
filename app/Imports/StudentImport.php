<?php 
namespace App\Imports;
use App\Models\Student;
use App\Models\Program;
use App\Models\User;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
class StudentImport implements ToModel
{
    /**
     * @return \Illuminate\Support\Facades\Collection
     */

     public function model(array $model)
     {
      // return new User([''=>$data[0]]);
      $program=Program::where('program_code', $model[4])->get();

      // $model = $request->validated();
      $user=User::create(
       [
           'name'=>$model[0].' '.$model[1],
           'username'=>$model[2],
           'role'=>'Student',
           'email'=>$model[5],
           'password'=>Hash::make($model[1]),
       ]
      );
      foreach($program as $program)
      Student::create(
       [
           'first_name'=>$model[0],
           'last_name'=>$model[1],
           'year_level'=>$model[3],
           'student_regno'=>$model[2],
           'finger_template'=>$model[2],
           'program_id'=>$program->id,
           'userid'=>$user['id'],
       ]
      ); 

      // $data =DB::table('program')
      // ->select('program.id as program')
      // // ->leftjoin('course','course.id','student.course_id')
      // ->leftjoin('program','program.id','student.program_id')
      // ->leftjoin('users','users.id','student.userid')
      // ->get();
     }

}


?>