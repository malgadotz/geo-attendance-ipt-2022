@extends('layouts.admin')

@section('content')

    <div class="row justify-content-stretch">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h2>{{ __('Scan QR Code  || Working On it ') }}</h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ url('student/sms/create') }}">
                        @csrf
                        <div id="reader" width="500px"></div>
                        <input type="file" id="qr-input-file" accept="image/*">
<!-- 
  Or add captured if you only want to enable smartphone camera, PC browsers will ignore it.
-->

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('submit') }}
                                </button>
                            </div>
                        </div>
                        
                    </form>

                    <div id="qr-reader" style="width: 600px"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
