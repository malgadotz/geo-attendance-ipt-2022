@extends('layouts.admin')

@section('content')

    <div class="row justify-content-stretch">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h6>{{ __('My Courses') }}</h6>
                    @if( session('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                    @endif
                    @if (Auth::user()->role == 'Admin')
                    <a href="{{url('admin/staffcourse/add')}}" class="btn btn-primary float-end">{{ __('Assign Course') }}</a>
                    <a href="{{url('admin/staffcourse/export')}}" class="btn btn-secondary m-auto float-left"><i class="bx bx-file icon "></i>  {{ __('Export') }}</a>
                    @endif
                </div>

                <div class="card-body">
                <div class="table-responsive">
                <table id="dataTable" class="table table-striped table-bordered table-sm" cellspacing="0" style="width:100%">
                      <thead>
                        <tr>
                            <th>#</th>
                            @if (Auth::user()->role == 'Admin')
                            <th>Full Name</th>
                            @endif
                            <th>Course Name</th>
                            <th>Course Code</th>
                            <th>Programme</th>
                            <th>Year</th>
                            @if (Auth::user()->role == 'Admin')
                            <th>Action</th>
                            @endif
                        </tr>
                      </thead>
                      <tbody>
                            <?php $a=1;?>
                      @foreach ($model as $model)
                      
                        <tr>
                            <td>{{$a++}}</td> 
                            @if (Auth::user()->role == 'Admin')
                            <td>{{$model->name}}  {{$model->name2}}</td>
                            @endif
                            <td>{{$model->coursename}}</td>
                            <td>{{$model->coursecode}}</td>
                            <td>{{$model->program}}</td>
                            <td>{{$model->year_level}}</td>
                            @if (Auth::user()->role == 'Admin')
                            <td width="100px"><a href="delete/{{$model->id}}" onclick="deleteMe(event)" class="btn udom-danger float-end btn-sm"><i class="bx bx-trash icon text-white"></i></a>
                              <a href="edit/{{$model->id}}" class=                               "btn udom-info m-auto float-left btn-sm"><i class="bx bx-edit icon text-white"></i></a>
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
