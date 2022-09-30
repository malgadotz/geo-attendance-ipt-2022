@extends('layouts.admin')

@section('content')

    <div class="row justify-content-stretch">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h6>{{ __('My Courses') }}</h6>
                    @if( session('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                    @endif
                </div>

                <div class="card-body">
                <div class="table-responsive">
                <table id="dataTable" class="table table-striped table-bordered table-sm" cellspacing="0" style="width:100%">
                      <thead>
                        <tr>
                            <th>#</th>
                            <th>Course Name</th>
                            <th>Course Code</th>
                            <th>Credits</th>
                            <th>Status</th>
                            <th>Programme</th>
                            <th>Year</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $a=1;?>
                      @foreach ($course as $model)
                      @if($yos == $model->year_level)
                        <tr>
                            <td>{{$a++}}</td>    
                            <td>{{App\Models\Course::find($model->course_id)->course_name}}</td>
                            <td>{{App\Models\Course::find($model->course_id)->course_code}}</td> 
                            <td>{{$model->credits}}</td>
                            <td>{{$model->status}}</td>
                            <td>{{App\Models\Program::find($model->program_id)->program_code}}</td>
                            <td>{{$model->year_level}}</td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
