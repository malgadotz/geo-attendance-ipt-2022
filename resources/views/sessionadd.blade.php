@extends('layouts.admin')

@section('content')

    <div class="row justify-content-stretch">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h2>{{ __('Add Session') }}</h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ url('staff/session/create') }}">
                        @csrf
                        @foreach($staff as $staff)
                        <input type="hidden" name="staff_id" value="{{$staff->id}}">
                        @endforeach

                        <div class="row mb-3">
                            <label for="activity_name" class="col-md-4 col-form-label text-md-end">{{ __('Activity Name') }}</label>

                            <div class="col-md-6">
                            <select id="activity_name" type="text" class="form-control @error('activity_name') is-invalid @enderror" name="activity_name" value="{{ old('activity_name') }}" required autocomplete="activity_name" autofocus>                      
                                        
                                        <option :value="Lecture">Lecture</option>
                                        <option :value="Practical">Practical</option>
                                        <option :value="Tutorial">Tutorial</option>
                                        <option :value="Class Discussion">Class Discussion</option>
                              
                                </select>
                                @error('activity_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="locality" class="col-md-4 col-form-label text-md-end">{{ __('Venue') }}</label>
                            <div class="col-md-6">
                                <select id="venueid" class="form-control @error('venueid') is-invalid @enderror" name="venueid" value="{{ old('venueid') }}" required autocomplete="venueid" autofocus>                      
                                    @foreach($venue as $venue)    
                                        <option value="{{$venue->id}}">{{$venue->code}} [{{$venue->capacity}}]</option>
                                    @endforeach
                                </select>
                                @error('venueid')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="course_id" class="col-md-4 col-form-label text-md-end">{{ __('Course') }}</label>
                            <div class="col-md-6">
                                <select id="course_id"  class="form-control" name="course_id" value="{{ old('course_id') }}" required>                      
                                    @foreach($course as $course)    
                                        <option value="{{$course->course_id}}">{{App\Models\Course::find($course->course_id)->course_name}} ({{App\Models\Course::find($course->course_id)->course_code}}) ({{$course->year_level}})</option>
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
                            <label for="program_id" class="col-md-4 col-form-label text-md-end">{{ __('Program') }}</label>
                            <div class="col-md-6">
                                <select id="program_id"  class="form-control" name="program_id">                      
                                    @foreach($program as $program)    
                                        <option value="{{$program->id}}">{{$program->name}} ({{$program->program_code}})</option>
                                    @endforeach
                                </select>
                                @error('program_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="year_level" class="col-md-4 col-form-label text-md-end">{{ __('YOS') }}</label>

                            <div class="col-md-6">
                            <select id="year_level" class="form-control @error('year_level') is-invalid @enderror" name="year_level" value="{{ old('year_level') }}" required autocomplete="year_level" autofocus>                      
                                        
                                        <option :value="1">1</option>
                                        <option :value="2">2</option>
                                        <option :value="3">3</option>
                                        <option :value="4">4</option>
                              
                                </select>
                                @error('year_level')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="date" class="col-md-4 col-form-label text-md-end">{{ __('Date') }}</label>

                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required autocomplete="date" autofocus>

                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="identifier" class="col-md-4 col-form-label text-md-end">{{ __('Start Time') }}</label>

                            <div class="col-md-6">
                                <input id="start_time" type="time" class="form-control @error('start_time') is-invalid @enderror" name="start_time" value="{{ old('start_time') }}" required autocomplete="start_time" autofocus>

                                @error('start_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="end_time" class="col-md-4 col-form-label text-md-end">{{ __('End Time') }}</label>

                            <div class="col-md-6">
                                <input id="end_time" type="time" class="form-control @error('end_time') is-invalid @enderror" name="end_time" value="{{ old('end_time') }}" required autocomplete="identifier" autofocus>

                                @error('end_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('add session') }}
                                </button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
