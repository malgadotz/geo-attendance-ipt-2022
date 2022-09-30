<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StaffCourse;
use App\Models\Course;
use App\Models\Program;
use App\Models\Staff;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StaffCourseRequest;
use App\Imports\StaffCourseImport;
use App\Exports\StaffCourseExport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;


class StaffCourseController extends Controller
{
    //
    public function view()
    {
        $model=DB::table('staffcourse')
        ->select('staffcourse.*','teacher.first_name as name','teacher.last_name as name2','course.course_code as coursecode','course.course_name as coursename','program.program_code as program')
        ->leftjoin('teacher','teacher.id','staffcourse.staff_id')
        ->leftjoin('course','course.id','staffcourse.course_id')
        ->leftjoin('program','program.id','staffcourse.program_id')
        ->orderBy('staff_id')
        ->get()
        ;
        return view('staffcourseview', ['model'=>$model]);
    }
    public function staffview()
    {

        
        $staff = Staff::where('userid', Auth()->user()->id)->get();
        foreach($staff as $staff){
        $model=DB::table('staffcourse')
        ->select('staffcourse.*','teacher.first_name as name','teacher.last_name as name2','course.course_code as coursecode','course.course_name as coursename','program.program_code as program')
        ->leftjoin('teacher','teacher.id','staffcourse.staff_id')
        ->leftjoin('course','course.id','staffcourse.course_id')
        ->leftjoin('program','program.id','staffcourse.program_id')
        ->where('staffcourse.staff_id',$staff->id)
        ->get();
        return view('staffcourseviewstaff', ['model'=>$model]);
    }}
    public function add()
    {
        $staff = Staff::all();
        $program = Program::all();
        $course =Course::all();
        return view('staffcourseadd', ['staff'=>$staff,'program'=>$program,'course'=>$course]);
    }
    
    public function create(StaffCourseRequest $request)
    {
        $data = $request->validated();
        $model= new StaffCourse;

        $model->staff_id=$data['staff_id'];
        $model->course_id=$data['course_id'];
        $model->program_id=$data['program_id'];
        $model->year_level=$data['year_level'];
        if($model->save())
        Alert::toast('Course Assigned Succesfully ','success');

        return redirect('admin/staffcourse/view');
    }
    public function exportstaffcourse()
    {
        return Excel::download(new StaffCourseExport, 'staffcourses.xlsx');
    }
    public function importstaffcourse()
    {
        Excel::Import(new StaffCourseImport, request()->file('file'));
        return redirect('admin/staffcourse/view')->with('message','Data Imported');
    }
    public function import()
    {
        return view('staffcourseimport');
    }
    public function delete($id)
    {
        $model=StaffCourse::find($id);     
        
        if($model->delete())
        Alert::toast('Course Unassigned Succesfully ','success');
        return redirect('admin/staffcourse/view');
    }

    public function edit($id)
    {
        $model = StaffCourse::find($id);
        $staffnow = Staff::find($model->staff_id);   
        $coursenow=Course::find($model->course_id);     
        $programnow=Program::find($model->program_id); 

        $staff = Staff::all();
        $program = Program::all();
        $course =Course::all();
        return view('staffcourseedit', ['staff'=>$staff,'program'=>$program,'course'=>$course, 'model'=>$model,'staffnow'=>$staffnow,'coursenow'=>$coursenow,'programnow'=>$programnow]);
    }

    public function update(Request $data)
    {
         // $data = $req->validated();
        $model = StaffCourse::find($data->scid);
        $model->staff_id=$data['staff_id'];
   
        $model->course_id=$data['course_id'];
        $model->program_id=$data['program_id'];
        $model->year_level=$data['year_level'];
        if($model->save())
        Alert::toast('Course Updated Succesfully ','success');
    
        return redirect('admin/staffcourse/view');

    }
}
