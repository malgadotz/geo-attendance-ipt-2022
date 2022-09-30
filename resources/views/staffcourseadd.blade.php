@extends('layouts.admin')

@section('content')

    <div class="row justify-content-stretch">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h2>{{ __('Assign Course') }}</h2>
                    <a href="{{url('admin/staffcourse/import')}}" class="btn btn-danger float-end center"><i class="bx bx-file icon  text-success"></i> {{ __('Import') }}</a>
                    
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ url('admin/staffcourse/create') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="staff_id" class="col-md-4 col-form-label text-md-end">{{ __('staff') }}</label>
                            <div class="col-md-6">
                                <select id="staff_id"  class="form-control" name="staff_id">                      
                                    @foreach($staff as $staff)    
                                        <option value="{{$staff->id}}">{{$staff->first_name}}  {{__(' ')}} {{$staff->last_name}}</option>
                                    @endforeach
                                </select>

                                @error('staff_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>      <div class="row mb-3">
                            <label for="course_id" class="col-md-4 col-form-label text-md-end">{{ __('course') }}</label>
                            <div class="col-md-6">
                                <select id="course_id"  class="form-control" name="course_id">                      
                                    @foreach($course as $course)    
                                        <option value="{{$course->id}}">[{{$course->course_code}}] {{$course->course_name}}</option>
                                    @endforeach
                                </select>

                                @error('course_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>      <div class="row mb-3">
                            <label for="program_id" class="col-md-4 col-form-label text-md-end">{{ __('Program') }}</label>
                            <div class="col-md-6">
                                <select id="program_id"  class="form-control" name="program_id">                      
                                    @foreach($program as $program)    
                                        <option value="{{$program->id}}">{{$program->program_code}}</option>
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
                            <label for="year_level" class="col-md-4 col-form-label text-md-end">{{ __('Year Level') }}</label>
                            <div class="col-md-6">
                                <select id="year_level" type="text" class="form-control @error('year_level') is-invalid @enderror" name="year_level" value="{{ old('year_level') }}" required autocomplete="year_level" autofocus>                      
                                   
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                                @error('year_level')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('assign course') }}
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
