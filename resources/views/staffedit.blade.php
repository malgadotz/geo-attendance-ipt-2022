@extends('layouts.admin')

@section('content')

    <div class="row justify-content-stretch">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h2>{{ __('Update Staff') }}</h2>
                </div>

                <div class="card-body">
                    <form method="POST" id="staff-form" action="update">
                        @csrf
                        <input type="hidden" name="uid" value="{{$user->id}}" class="form-control">
                        <input type="hidden" name="sid" value="{{$model->id}}" class="form-control">
                        
                        <div class="row mb-3">
                            <label for="course_code" class="col-md-4 col-form-label text-md-end">{{ __('Mobile') }}</label>
                            <div class="col-md-6">
                                <input  type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{$model->mobile}}" required autocomplete="mobile" autofocus>

                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="course_code" class="col-md-4 col-form-label text-md-end">{{ __('first') }}</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{$model->first_name}}" required autocomplete="course_code" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    
                        <div class="row mb-3">
                            <label for="course_code" class="col-md-4 col-form-label text-md-end">{{ __('Last') }}</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control @error('course_code') is-invalid @enderror" name="last_name" value="{{ $model->last_name}}" required autocomplete="course_code" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="course_code" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input  type="email" class="form-control @error('course_code') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="course_code" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    
                        </form>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                            <button class="btn btn-primary"
                        onclick="addStaff(event)">
                                      
                       
                        {{ __('add') }}
</button>
                            </div>
                        </div>
                        
                    
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
