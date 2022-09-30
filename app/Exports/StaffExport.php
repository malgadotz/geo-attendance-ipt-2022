<?php 
namespace App\Exports;
use App\Models\Staff;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
class StaffExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Facades\Collection
     */

     public function collection(){
        // return teacher::all();
        $data =DB::table('teacher')
        ->select('teacher.first_name','teacher.last_name','teacher.staff_no','teacher.mobile','users.email as email')
        ->leftjoin('users','users.id','teacher.userid')
        ->get();
        // $teachers = teacher::select('first_name','last_name','teacher_regno','year_level')->get();
        return $data;
     }

}


?>