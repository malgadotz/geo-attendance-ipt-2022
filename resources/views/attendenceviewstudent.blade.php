@extends('layouts.admin')

@section('content')

    <div class="row justify-content-stretch">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header container-fluid">
                    <h6 class="pull-left">{{ __('Home / Attendance') }}</h6>
                    @if( session('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                    @endif
                    @if ( Auth::user()->role  == 'Student')
                    <a href="{{url('student/session/view/student')}}" class="btn btn-primary float-end">{{ __('View Sessions To Attendence') }}</a>
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
                            <th>Course Name</th>
                            <th>Code</th>
                            <th>Instructor Name</th>
                            <th>Taken At</th>
                            <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($model as $model)
                        <tr>
                            <td>{{$model->id}}</td>    
                            <td>{{App\Models\Student::find($model->student_id)->first_name}}</td>
                            <td>{{App\Models\Student::find($model->student_id)->last_name}}</td>
                            <td>{{App\Models\Student::find($model->student_id)->student_regno}}</td>
                            <td>{{App\Models\Course::find($model->course_id)->course_name}}</td>
                            <td>{{App\Models\Course::find($model->course_id)->course_code}}</td>
                            <td>{{App\Models\User::find(App\Models\Staff::find($model->staff_id)->userid)->name}}</td>
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
