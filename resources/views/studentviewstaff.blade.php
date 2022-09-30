@extends('layouts.admin')

@section('content')

    <div class="row justify-content-stretch">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h6>{{ __('Students') }}</h6>
                    @if( session('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                    @endif
                    @if(Auth()->user()->role =='Admin')
                    <a href="{{url('admin/student/add')}}" class="btn btn-primary float-end">{{ __('Add Student') }}</a>
                    <a href="{{url('admin/studentexport')}}" class="btn udom-export  m-auto float-left"><i class="bx bx-file icon "></i>  {{ __('Download Excel sheet') }}</a>
                    @endif
                </div>

                <div class="card-body">
                <div class="table-responsive">
                <table id="dataTable" class="table table-striped table-bordered table-sm" cellspacing="0" style="width:100%">
                      <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Registration No</th>
                            <th>Code</th>
                            <th>Programme</th>
                            <th>YOS</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $a=1;?>
                      @foreach ($mode as $mode)
                     <?php
                        $models = DB::table('student')
                        ->select('student.*','program.program_code as program','users.email as email')
                        ->leftjoin('program','program.id','student.program_id')
                        ->leftjoin('users','users.id','student.userid')
                        ->where('student.program_id', $mode->program_id)
                        ->where('student.year_level', $mode->year_level)
                        // ->groupBy('student.program_id','student.year_level')
                        ->get();
                        ?>
                      @foreach ($models as $model)
                      <tr>
                            <td>{{$a++}}</td>    
                            <td>{{$model->first_name}}</td>
                            <td>{{$model->last_name}}</td>
                            <td>{{$model->student_regno}}</td>
                            <td>{{$mode->coursecode}}</td>
                            <td>{{$model->program}}</td>
                            <td>{{$model->year_level}}</td>
                        </tr>
                        @endforeach
                        @endforeach
                    </tbody>
                </table>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection