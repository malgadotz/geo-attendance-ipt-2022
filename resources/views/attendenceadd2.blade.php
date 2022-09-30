@extends('layouts.admin')

@section('content')

    <div class="row justify-content-stretch">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h2>{{ __('Make Attendence') }}</h2>
                </div>

                <div class="card-body">

                    <form method="POST" id="form-attendence-add" action="{{ url('student/attendence/create') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="student_id" class="col-md-4 col-form-label text-md-end">{{ __('Registration Number') }}</label>

                            <div class="col-md-6">
                            <select id="student_id"  class="form-control" name="student_id" >                      
                                    @foreach($student as $student)    
                                        <option value="{{$student->id}}" selected>{{$student->student_regno}}</option>
                                    @endforeach
                                </select>
                                @error('student_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="activity_id" class="col-md-4 col-form-label text-md-end">{{ __('Session') }}</label>

                            <div class="col-md-6">
                                 <select id="activity_id"  class="form-control" name="activity_id">                      
                                    @foreach($activity as $model)    
                                        <option value="{{$model->id}}"> {{App\Models\Course::find($model->course_id)->course_code}}  {{$model->activity_name}} **  {{App\Models\Venue::find($model->venueid)->code}}  </option>
                                    @endforeach
                                </select>
                                @error('activity_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="course_id" class="col-md-4 col-form-label text-md-end">{{ __('Course') }}</label>

                            <div class="col-md-6">
                                 <select id="course_id"  class="form-control" name="course_id">                      
                                    @foreach($course as $course) 
        <?php $courses = App\Models\Course::find($course->id);?>

                                        <option value="{{$courses->id}}">
                                            {{$courses->course_code}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('course_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="status" class="col-md-4 col-form-label text-md-end">{{ __('Verification Token') }}</label>

                            <div class="col-md-6">
                                <input id="status" type="text" class="form-control @error('status') is-invalid @enderror" name="status" value="{{ old('status') }}" required autocomplete="status" autofocus>

                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" onclick="MakeAttendance(event)" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                        <!-- <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                            <button class="btn btn-primary"
                        onclick="addStaff(event)">
                                      
                       
                        {{ __('add') }}
</button>
                            </div>
                        </div> -->
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
