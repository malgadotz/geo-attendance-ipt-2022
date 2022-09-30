<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProgramRequest;
use App\Models\Program;
use RealRashid\SweetAlert\Facades\Alert;
class ProgramController extends Controller
{
    //
    public function view()
    {
        $model = Program::all();
        return view('programview', ['model'=>$model]);
    }
    public function add()
    {
        return view('programadd');
    }
   
    public function store(ProgramRequest $request)
    {
        $data = $request->validated();
        $model= new Program;

        $model->name=$data['name'];
        $model->program_code=$data['program_code'];
        $model->years=$data['years'];
        $model->save();

return redirect('admin/program/view')->with('message', 'Program added');

    }
    public function delete($id)
    {
        $model=Program::find($id);     
        if($model->delete())
        Alert::toast('program Deleted Succesfully ','success');
           return redirect('admin/program/view');
    }

    public function edit($id)
    {
        $model = Program::find($id);   
        return view('programedit', ['model'=>$model]);
    }
    
    public function update(Request $data)
    {
        // $data = $req->validated();
        $model = Program::find($data->pid);

        $model->name=$data['name'];
        $model->program_code=$data['program_code'];
        $model->years=$data['years'];
        if($model->save())
        Alert::toast('program Updated Succesfully ','success');
        
           return redirect('admin/program/view');

    }
   
}
