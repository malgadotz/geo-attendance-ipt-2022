@extends('layouts.admin')

@section('content')
	
    <div class="row justify-content-stretch">
    <ol class="breadcrumb ">
        <li class="offset-md-2"><a href="{{url('admin/dashboard')}}">Home </a></li>
        / <li class="active"> Staff </li>
        / <li class="active"> View</li>
</ol>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h6>{{ __('Staffs') }}</h6>
                    @if( session('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                    @endif
                    <a href="{{url('admin/staff/add')}}" class="btn btn-primary float-end">{{ __('Add Staff') }}</a>
                    <a href="{{url('admin/staffexport')}}" class="btn udom-export m-auto float-left"><i class="bx bx-file icon "></i>  {{ __('Export Excel sheet') }}</a>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                <table id="dataTable" class="table table-striped table-bordered table-sm" cellspacing="0" style="width:100%">
                      <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Staff No</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $a=1;?>
                      @foreach ($model as $model)
                        <tr>
                            <td>{{$a++}}</td>    
                            <td>{{$model->first_name}}</td>
                            <td>{{$model->last_name}}</td>
                            <td>{{$model->staff_no}}</td>
                            <td>+255 {{$model->mobile}}</td>
                            <td>{{$model->email}}</td>
                            <td>
                            <a href="delete/{{$model->id}}" onclick="deleteMe(event)" class="btn udom-danger float-end btn-sm"><i class="bx bx-trash icon text-white"></i></a>
                              <a href="edit/{{$model->id}}" class=                               "btn udom-info m-auto float-left btn-sm"><i class="bx bx-edit icon text-white"></i></a>

                            </td>
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

