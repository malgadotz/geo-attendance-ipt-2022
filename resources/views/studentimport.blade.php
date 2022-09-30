@extends('layouts.admin')

@section('content')

    <div class="row justify-content-stretch">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h2>{{ __('Import Students') }}</h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ url('admin/student/importstudent') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="first_name" class="col-md-4 col-form-label text-md-end">{{ __('Excel Sheet') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="file" class="form-control @error('file') is-invalid @enderror" name="file" value="{{ old('file') }}" required autocomplete="first_name" autofocus>

                                @error('File')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                      
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" value="Import Data" class="btn btn-primary">
                                    {{ __('Import') }}
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
