@extends('layouts.admin')

@section('content')

    <div class="row justify-content-stretch">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h6>{{ __('Programmes') }}</h6>
                    @if( session('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                    @endif
                    <a href="{{url('admin/program/add')}}" class="btn btn-primary float-end">{{ __('Add Program') }}</a>

                </div>

                <div class="card-body">
                <div class="table-responsive">
                <table id="dataTable" class="table table-striped table-bordered table-sm" cellspacing="0" style="width:100%">
                      <thead>
                        <tr>
                            <th>#</th>
                            <th>Programme Name</th>
                            <th>Program Code</th>
                            <th>Years</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $a=1;?>
                      @foreach ($model as $model)
                        <tr>
                            <td>{{$a++}}</td>    
                            <td>{{$model->name}}</td>
                            <td>{{$model->program_code}}</td>
                            <td>{{$model->years}}</td>
                            <td>
                            <a href="delete/{{$model->id}}" onclick="deleteMe(event)" class="btn udom-danger float-end btn-sm"><i class="bx bx-trash icon text-white"></i></a>
                              <a href="edit/{{$model->id}}" class="btn udom-info m-auto float-left btn-sm"><i class="bx bx-edit icon text-white"></i></a>
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
