@extends('layouts.admin')

@section('content')

    <div class="row justify-content-stretch ">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header udom-SECONDARY">
                    <h6>{{ __('Session Venue') }}</h6>
                    @if( session('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                    @endif
                    @if(Auth::user()->role == "Admin")
                    <a href="{{url('admin/venue/add')}}" class="btn btn-primary float-end">{{ __('Add Venue') }}</a>
                    @endif
                </div>

                <div class="card-body">
                <div class="table-responsive">
                
                <table id="table" class="table table-striped table-bordered table-sm" cellspacing="0" style="width:100%">
                      <thead>
                        <tr>
                            <th>#</th>
                            <th>Venue Code</th>
                            <th>Venue Located</th>
                            <th>Venue Capacity</th>
                            <!-- <th>Venue Identifier</th> -->
                            @if(Auth::user()->role == "Admin")
                            <th>Action</th>
                            @endif
                        </tr>
                      </thead>
                      <tbody>
                        <?php $a=1?>
                      @foreach ($model as $model)
                        <tr>
                            <td>{{$a++}}</td>    
                            <td>{{$model->code}}</td>
                            <td>{{$model->locality}}</td>
                            <td>{{$model->capacity}}</td>
                            <!-- <td>{{$model->identifier}}</td> -->

                        @if(Auth::user()->role == "Admin")

                            <td colspan="center" width="125px">
                            <a href="delete/{{$model->id}}" onclick="deleteMe(event)" class="btn udom-danger btn-sm"><i class="bx bx-trash icon text-white"></i></a>
                            <a href="edit/{{$model->id}}" class="btn udom-info m-auto btn-sm"><i class="bx bx-edit icon text-white"></i></a>
                              <a href="location/{{$model->id}}" class="btn udom-light m-auto btn-sm"><i class="bx bx-map udom-text-danger icon"></i></a>
                            </td>
                                
                        @endif                    
                        </tr>
                      @endforeach
                    </tbody>
                </table>
                </div>  
                
            </div>
        </div>
    </div>
</div>
@endsection
