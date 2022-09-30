@extends('layouts.admin')

@section('content')

    <div class="row justify-content-stretch">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h2>{{ __('Add Program') }}</h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ url('admin/program/store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Program Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="program_code" class="col-md-4 col-form-label text-md-end">{{ __('Program Code') }}</label>

                            <div class="col-md-6">
                                <input id="program_code" type="text" class="form-control @error('program_code') is-invalid @enderror" name="program_code" value="{{ old('program_code') }}" required autocomplete="program_code" autofocus>

                                @error('program_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    

                        <div class="row mb-3">
                            <label for="years" class="col-md-4 col-form-label text-md-end">{{ __('Years') }}</label>
                            <div class="col-md-6">
                                <select id="years" type="text" class="form-control @error('years') is-invalid @enderror" name="years" value="{{ old('years') }}" required autocomplete="years" autofocus>                      
                                   
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                                @error('years')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('add') }}
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
