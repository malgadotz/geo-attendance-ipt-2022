<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Http\Requests\CourseRequest;
use RealRashid\SweetAlert\Facades\Alert;

class CourseController extends Controller
{
    //
    public function view()
    {
        $model= Course::all();
        return view('courseview', ['model'=>$model]);
    }
    public function add()
    {
        return view('courseadd');
    }
    
    public function create(CourseRequest $request)
    {
        $data = $request->validated();
        $model= new Course;

        $model->course_name=$data['course_name'];
        $model->course_code=$data['course_code'];
        $model->save();
        Alert::toast('Course added Succesfully','success');
return redirect('admin/course/view');
    }
    public function delete($id)
    {
        $model=Course::find($id);     
        if($model->delete())
        Alert::toast('Course Deleted Succesfully ','success');
           return redirect('admin/course/view');
    }

    public function edit($id)
    {
        $model = Course::find($id);   
        return view('courseedit', ['model'=>$model]);
    }
    
    public function update(Request $data)
    {
        // $data = $req->validated();
        $model = Course::find($data->cid);

        $model->course_name=$data['course_name'];
        $model->course_code=$data['course_code'];
        if($model->save())
        Alert::toast('Course Updated Succesfully ','success');
        
           return redirect('admin/course/view');

    }
}
