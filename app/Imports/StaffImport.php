<?php 
namespace App\Imports;
use App\Models\Staff;
use App\Models\Program;
use App\Models\User;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
class StaffImport implements ToModel
{
    /**
     * @return \Illuminate\Support\Facades\Collection
     */

     public function model(array $model)
     {
    
      $user=User::create(
       [
           'name'=>$model[0].' '.$model[1],
           'username'=>$model[2],
           'role'=>'Staff',
           'email'=>$model[4],
           'password'=>Hash::make($model[1]),
       ]
      );
      Staff::create(
       [
           'first_name'=>$model[0],
           'last_name'=>$model[1],
           'staff_no'=>$model[2],
           'mobile'=>$model[3],
           'userid'=>$user['id'],
       ]
      ); 

      // $data =DB::table('program')
      // ->select('program.id as program')
      // // ->leftjoin('course','course.id','staff.course_id')
      // ->leftjoin('program','program.id','staff.program_id')
      // ->leftjoin('users','users.id','staff.userid')
      // ->get();
     }

}


?>