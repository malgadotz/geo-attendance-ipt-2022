@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                 <div class="card-header">
                 <h2 class="mt-4 display-5 text-primary">     {{ __('Wellcome Dear :') }} {{Auth::user()->role }}<br>
                    {{ __('Full Name:') }} {{Auth::user()->name }}<br>
                    {{ __('Mobile :') }} {{Auth::user()->username }}<br>
                    {{ __('Email :') }} {{Auth::user()->email }}<br>
                    {{ __('Member Since :') }} {{Auth::user()->created_at}}
                    </h2>
                 </div>        
                </div>
            </div>
        </div>
       
    </div>
</div>
@endsection
