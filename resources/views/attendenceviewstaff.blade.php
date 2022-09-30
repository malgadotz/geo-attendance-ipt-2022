@extends('layouts.admin')

@section('content')

    <div class="row justify-content-stretch">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h6>{{ __('Attendance') }}</h6>
                    @if( session('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                    @endif
                    @if( Auth::user()->role  == 'Staff')
                    <a href="{{url('staff/attendence/export')}}" class="btn udom-export m-auto float-left"><i class="bx bx-file icon "></i>  {{ __('Export Excel Sheet') }}</a>
                    @endif
                </div>
                <div class="card-body">
                <div class="table-responsive">
                <table id="table" class="table  table-bordered table-sm" cellspacing="0" style="width:100%">
                      <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Regno</th>
                            <th>Programme</th>
                            <th>Course Name</th>
                            <th>Course</th>
                            <th>Taken At</th>
                            <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($model as $model)
                      <?php $attend=App\Models\Attendance::where('course_id',$model->course_id);?>
                      @foreach ($attend as $attend)
                        <tr>
                            <td>{{$model->id}}</td>    
                            <td>{{App\Models\Student::find($attend->student_id)->first_name}}</td>
                            <td>{{App\Models\Student::find($attend->student_id)->last_name}}</td>
                            <td>{{App\Models\Student::find($attend->student_id)->student_regno}}</td>
                            <td>{{App\Models\Program::find(App\Models\Student::find($attend->student_id)->program_id)->program_code}}</td>
                            <td>{{App\Models\Course::find($attend->course_id)->course_name}}</td>
                            <td>{{App\Models\Course::find($attend->course_id)->course_code}}</td>
                            <td>{{$attend->created_at}}</td>
                            <td>{{$attend->status}}</td>
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
