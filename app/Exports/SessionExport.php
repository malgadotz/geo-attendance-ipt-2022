<?php 
namespace App\Exports;
use App\Session;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
class SessionExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Facades\Collection
     */

     public function collection(){
      $data =DB::table('session')
      ->select('session.*','venue.code as venue', 'course.course_code as course', 'venue.identifier as token','program.program_code as program')
      ->leftjoin('venue', 'venue.id', 'session.venueid')
      ->leftjoin('course','course.id','session.course_id')
      ->leftjoin('program','program.id','session.program_id')
      ->get();
        // $staffs = Staff::select('first_name','last_name','staff_regno','year_level')->get();
        return $data;
     }

}


?>