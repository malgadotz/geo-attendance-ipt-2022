<?php

namespace App\Http\Controllers;
use App\Models\Program;
use App\Models\Course;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\StudentCourse;
use App\Models\Student;
use App\Http\Requests\StudentCourseRequest;
use RealRashid\SweetAlert\Facades\Alert;

class StudentCourseController extends Controller
{
    //
    public function view()
    {
        $model=DB::table('studentcourse')
        ->select('studentcourse.*', 'program.program_code as program','course.course_code as coursecode','course.course_name as coursename','course.course_name as coursename')
        ->leftjoin('program','program.id','studentcourse.program_id')
        ->leftjoin('course','course.id','studentcourse.course_id')
        ->orderBy('course_id', 'asc')
        ->orderBy('program_id', 'asc')
        ->orderBy('year_level', 'asc')
        ->get();
        return view('studentcourseview', ['model'=>$model]);
    }
    public function add()
    {
        $program = Program::all();
        $course = Course::all();
        return view('studentcourseadd', ['program'=>$program,'course'=>$course]);
    }
    public function studentcourse()
    {   $id = Auth()->user()->id;
        $student = Student::where('userid',$id)->get();
        // Alert::toast($student->program_id,'success');
        foreach($student as $student){
        $course = StudentCourse::where('program_id',$student->program_id)->get();
        $year=$student->year_level;
        return view('studentcourse', ['course'=>$course,'yos'=>$year]);
    }
    }
    
    public function create(StudentCourseRequest $request)
    {
        $data = $request->validated();
        $model= new StudentCourse;

        $model->course_id=$data['course_id'];
        $model->program_id=$data['program_id'];
        $model->year_level=$data['year_level'];
        $model->save();
        Alert::toast('course assigned','success');
    return redirect('admin/studentcourse/view');
    }

    public function delete($id)
    {
        $model=StudentCourse::find($id);
        $model->delete();
        Alert::toast('Course unasigned', 'success');
        return redirect('admin/studentcourse/view');
    }
       public function edit($id)
    {
        $model=StudentCourse::find($id);
        $program = Program::all();
        $course = Course::all();
        return view('studentcourseedit',['program'=>$program,'course'=>$course,'model'=>$model]);
    }
    public function update(StudentCourseRequest $request)
    {
        $data = $request->validated();
        $model= StudentCourse::find($data['scid']);

        $model->course_id=$data['course_id'];
        $model->program_id=$data['program_id'];
        $model->year_level=$data['year_level'];
        $model->credits=$data['credits'];
        $model->status=$data['status'];
        $model->save();
        Alert::toast(' assigned course updated','success');
    return redirect('admin/studentcourse/view');
    }

    public function exportstudent()
    {
        return Excel::download(new StudentCourseExport, 'studentcourse.xlsx');
    }
    public function importstudentcourse()
    {
        Excel::Import(new StudentCourseImport, request()->file('file'));
        return redirect('admin/studentcourse/view')->with('message','Student created, Username:RegNO, Password:Last Name');
    }
    public function import()
    {
        return view('studentcourseimport');
    }

}
