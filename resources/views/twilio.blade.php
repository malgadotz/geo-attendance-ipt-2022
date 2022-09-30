@extends('layouts.admin')

@section('content')

    <div class="row justify-content-stretch">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h2>{{ __('Send sms') }}</h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ url('staff/sms/create') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="course_name" class="col-md-4 col-form-label text-md-end">{{ __(' number') }}</label>
                            <div class="col-md-6">
                            <select id="number"  class="form-control" name="number">                      
                                        <option value="755670197">+255 755 670 197  [Icconn] [CR BSC SE 4]</option>
                                        <option value="694387907">+255 694 387 907  [pauloo] [CR BSC CE 4]</option>
                                        <option value="676964744">+255 676 964 744  [anna]  [CR BSC TE 4]</option>
                                        <option value="743897920">+255 743 897 920  [Lameck]  [HOD]</option>
                                        <option value="756604750">+255 756 604 750   [malgado] [Team]</option>763 889 300
                                        <option value="763889300">+255 763 889 300   [Kifalu] [Team]</option>
                                </select>
                                @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="course_code" class="col-md-4 col-form-label text-md-end">{{ __('Message Body') }}</label>
                            <div class="col-md-6">
                                <textarea  type="text" class="form-control" name="mesage" placeholder=" Type your message here"  required >
                                </textarea>
                                @error('mesage')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send') }}
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
