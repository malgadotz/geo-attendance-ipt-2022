<?php 
namespace App\Exports;
use App\Course;
use Maatwebsite\Excel\Concerns\FromCollection;
class CourseExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Facades\Collection
     */

     public function collection(){
        return Course::all();
     }

}


?>