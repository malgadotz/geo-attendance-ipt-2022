@extends('layouts.admin')

@section('content')

    <div class="row justify-content-stretch">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h2>{{ __('Make Attendence') }}</h2>
                </div>

                <div class="card-body">
                <?php $coord=App\Models\Geotable::where('venue_id',$model->venueid)->get();?>
                @foreach($coord as $coord)

                    <form method="POST" id="form-attendence-add" action="{{ url('student/attendence/create') }}">
                        @csrf
                        <input type="hidden" name="staff_id" value="{{$model->staff_id}}">
                        <input type="hidden" name="min_lat" id="min_lat" value="{{$coord->min_lat}}">
                        <input type="hidden" name="max_lat" value="{{$coord->max_lat}}">
                        <input type="hidden" name="min_long" value="{{$coord->min_long}}">
                        <input type="hidden" name="max_long" value="{{$coord->max_long}}">
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
                                        <option value="{{$model->id}}"> {{App\Models\Course::find($model->course_id)->course_code}}  {{$model->activity_name}} **  {{App\Models\Venue::find($model->venueid)->code}}  {{$model->start_time}}</option>
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

                                        <option value="{{$course->id}}">
                                            {{$course->course_code}}
                                        </option>
                                </select>
                                @error('course_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
  
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" onclick="MakeAttendance(event, <?=$coord->min_lat;?>)" class="btn btn-primary">
                                    {{ __('Attend') }}
                                </button>
                            </div>
                        </div>
                        
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
