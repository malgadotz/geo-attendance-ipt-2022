@extends('layouts.admin')

@section('content')

    <div class="row justify-content-stretch">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h2>{{ __('Update Assigned Course') }}</h2>

                </div>

                <div class="card-body">
                    <form method="POST" action="{{url('admin/studentcourse/edit/update') }}">
                        @csrf
                        <input type="hidden" name="scid" value="{{$model->id}}">
                        <div class="row mb-3">
                            <label for="program_id" class="col-md-4 col-form-label text-md-end">{{ __('Program') }}</label>
                            <div class="col-md-6">
                                <select id="program_id"  class="form-control" name="program_id">                      
                                        <option value="{{$model->program_id}}">{{App\Models\Program::find($model->program_id)->program_code}}</option>
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
                            <label for="course_id" class="col-md-4 col-form-label text-md-end">{{ __('course') }}</label>
                            <div class="col-md-6">
                                <select id="course_id"  class="form-control" name="course_id">                      
                                <option value="{{$model->course_id}}">{{App\Models\Course::find($model->course_id)->course_code}}</option>
                                @foreach($course as $course)    
                                        <option value="{{$course->id}}">{{$course->course_code}}</option>
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
                            <label for="credits" class="col-md-4 col-form-label text-md-end">{{ __('Credits') }}</label>
                            <div class="col-md-6">
                                <select id="credits"  class="form-control" name="credits">                      
                                        <option value="{{$model->status}}" >{{$model->credits}}</option>
                                        <option value="6.5">6.5</option>
                                        <option value="7.0">7.0</option>
                                        <option value="7.5">7.5</option>
                                        <option value="8.0">8.0</option>
                                        <option value="8.5">8.5</option>
                                        <option value="9.0">9.0</option>
                                        <option value="9.5">9.5</option>
                                        <option value="10.0">10.0</option>
                                        <option value="13">13</option>

                                </select>

                                @error('credits')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="status" class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>
                            <div class="col-md-6">
                                <select id="status" type="text" class="form-control @error('status') is-invalid @enderror" name="status" value="{{ old('status') }}" required autocomplete="status" autofocus>                      
                                   
                                    <option value="{{$model->status}}" >{{$model->status}}</option>
                                    <option value="Core">Core</option>
                                    <option value="Elective">Elective</option>
                                   
                                </select>
                                @error('year_level')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="year_level" class="col-md-4 col-form-label text-md-end">{{ __('Year') }}</label>
                            <div class="col-md-6">
                                <select id="year_level" type="text" class="form-control @error('year_level') is-invalid @enderror" name="year_level" value="{{ old('year_level') }}" required autocomplete="year_level" autofocus>                      
                                   
                                    <option value="{{$model->year_level}}">{{$model->year_level}}</option>
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
                                    {{ __('Update') }}
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
