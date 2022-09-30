@extends('layouts.admin')

@section('content')

    <div class="row justify-content-stretch">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h2>{{ __('Assign venue location || ') }} {{ $model->code}}</h2>

                </div>

                <div class="card-body">
                    <form method="POST" action="{{url('admin/venue/location/store')}}">
                        @csrf
                        <input type="hidden" name="venue_id" value="{{ $model->id}}">
                      
                        <div class="row mb-3">
                            <label for="min_lat" class="col-md-4 col-form-label text-md-end">{{ __('Mininum Latitude') }}</label>

                            <div class="col-md-6">
                                <input id="min_lat" type="text" class="form-control @error('min_lat') is-invalid @enderror" name="min_lat" value="{{old(' min_lat')}}" required autocomplete="min_lat" autofocus>

                                @error('min_lat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="min_long" class="col-md-4 col-form-label text-md-end">{{ __('Mininum Longitude') }}</label>

                            <div class="col-md-6">
                                <input id="min_long" type="text" class="form-control @error('min_long') is-invalid @enderror" name="min_long" value="{{old(' min_long')}}" required autocomplete="min_long" autofocus>

                                @error('min_long')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="max_lat" class="col-md-4 col-form-label text-md-end">{{ __('Maximum Latitude') }}</label>

                            <div class="col-md-6">
                                <input id="max_lat" type="text" class="form-control @error('max_lat') is-invalid @enderror" name="max_lat" value="{{old(' max_lat')}}" required autocomplete="max_lat" autofocus>

                                @error('max_lat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="max_long" class="col-md-4 col-form-label text-md-end">{{ __('Maximum Longitude') }}</label>

                            <div class="col-md-6">
                                <input id="max_long" type="text" class="form-control @error('max_long') is-invalid @enderror" name="max_long" value="{{old(' max_long')}}" required autocomplete="max_long" autofocus>

                                @error('max_long')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    

                        <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('submit') }}
                                </button>
                         
                            
                        <a href="#" onclick="getMyLocation()" class="btn udom-light "><i class="bx bx-current-location udom-text-danger icon"></i></a>
                               
                        </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
