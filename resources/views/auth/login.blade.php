@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mt-18">
        <div class="img-circle text-center center mt-138">
                <img   src="{{asset('assets/img/logo.ico')}}" alt="" width=200px height=200px ></div>
            <div class="card">
               
                <div class="card-header text-center home-color">{{ __('Student Attendence Management System (SAMS)') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="text-center center">
                        <div class="mb-3   text-center">
                            <!-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> -->

                            <div class="col-md-8 offset-md-2">
                                <input id="username" placeholder="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <!-- <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label> -->

                            <div class="col-md-8 offset-md-2">
                                <input id="password" placeholder="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
               
                        <div class=" row">
          
            <div class="col-4 offset-md-2">
                <button class="btn btn-primary btn-rounded btn-block full-width m-b"
                 type="submit"><i class="bx bx-sign-in icon"></i>&nbsp;&nbsp;Login
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