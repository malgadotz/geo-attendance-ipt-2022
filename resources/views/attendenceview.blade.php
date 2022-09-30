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
                    @if ( Auth::user()->role  == 'Student')
                    <a href="{{url('student/session/view')}}" class="btn btn-primary float-end">{{ __('View Sessions To Attendence') }}</a>
                    @elseif( Auth::user()->role  == 'Staff')
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
                            <th>Program</th>
                            <th>YOS</th>
                            <th>Course Name</th>
                            <th>Code</th>
                            <th>Taken At</th>
                            <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $a=1;?>
                      @foreach ($model as $model)
                        <tr>
                            <td>{{$a++}}</td>    
                            <td>{{$model->first_name}}</td>
                            <td>{{$model->last_name}}</td>
                            <td>{{$model->regno}}</td>
                            <td>{{App\Models\Program::find(App\Models\Student::find($model->student_id)->program_id)->program_code}}</td>
                            <td>{{App\Models\Student::find($model->student_id)->year_level}}</td>
                            <td>{{$model->subject}}</td>
                            <td>{{$model->code}}</td>
                            <td>{{$model->created_at}}</td>
                            <td>{{$model->status}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
