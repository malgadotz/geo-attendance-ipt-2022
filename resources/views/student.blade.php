@extends('layouts.admin')

@section('content')

        <div class="row">
           
        <div class="profile-card text-center shadow bfg-light mt-5 p-1 my-2 rounded-3 col-md-5 offset-md-4">
    <div class="profile-photo shadow">
        <img src="{{asset('assets/img/logo.ico')}}" alt="profile Photo" class="img-fluid">
    </div>
    <h3 class="pt-3 text-dark">{{_('Student Details')}}</h3>
    <p class="text-secondary">     {{ __('Wellcome Dear :') }} {{Auth::user()->role  }}<br>
                    {{ __('Full Name :') }} {{Auth::user()->name}}<br>
                    {{ __('Registration No :') }} {{Auth::user()->username }}<br>
                    {{ __('Email :') }} {{Auth::user()->email }}<br>
                    {{ __('Member Since :') }} {{Auth::user()->created_at}}<br>
                   @foreach ($student as $student)
                    {{ __('Program:') }} {{App\Models\Program::find($student->program_id)->name}}<br>
                    {{ __('Year Of Study:') }} {{$student->year_level}}
                    @endforeach
                    
                    </p>
  
</div>
</div>
<div class="row mt-10">
<div class="col-lg-3 col-sm-6 offset-md-1">
                <div class="card-box bg-blue">
                    <div class="inner">
                        <h3> 0 </h3>
                        <p> Student Sessions </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                    </div>
                    <a href="{{url('student/session/view/student')}}" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
 
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-green">
                    <div class="inner">
                        <h3> 2 </h3>
                        <p> Student Attendance</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-fingerprint" aria-hidden="true"></i>
                    </div>
                    <a href="{{url('student/attendence/view')}}" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-orange">
                    <div class="inner">
                        <h3>{{ 7}} </h3>
                        <p> My Courses </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-briefcase" aria-hidden="true"></i>
                    </div>
                    <a href="{{url('student/studentcourse/view')}}" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- 
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-red">
                    <div class="inner">
                        <h3> 723 </h3>
                        <p> Faculty Strength </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div> -->
                 




<!-- SAMPLE MODAL TEMPLATE -->
<!-- <button type="button" class="btn btn-success d-table my-5 mx-auto" data-bs-toggle="modal" data-bs-target="#ModalForm">
  Bootstrap Modal Form
</button> -->

<!-- Modal Form -->
<div class="modal fade" id="ModalForm" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <!-- Login Form -->
        <form action="">
          <div class="modal-header">
            <h5 class="modal-title">Modal Login Form</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
                <label for="Username">Username<span class="text-danger">*</span></label>
                <input type="text" name="username" class="form-control" id="Username" placeholder="Enter Username">
            </div>

            <div class="mb-3">
                <label for="Password">Password<span class="text-danger">*</span></label>
                <input type="password" name="password" class="form-control" id="Password" placeholder="Enter Password">
            </div>
            <div class="mb-3">
                <input class="form-check-input" type="checkbox" value="" id="remember" required>
                <label class="form-check-label" for="remember">Remember Me</label>
                <a href="#" class="float-end">Forgot Password</a>
            </div>
          </div>
          <div class="modal-footer pt-4">                  
            <button type="button" class="btn btn-success mx-auto w-100">Login</button>
          </div>
          <p class="text-center">Not yet account, <a href="#">Signup</a></p> 
      </form>
    </div>
  </div>

@endsection
