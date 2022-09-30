@extends('layouts.admin')

@section('content')

    <div class="row justify-content-stretch">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h6>{{ __('Courses') }}</h6>
                    <a href="{{url('admin/course/add')}}" class="btn btn-primary float-end">{{ __('Add Course') }}</a>
                    @if( session('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                    @endif
                </div>

                <div class="card-body">
                <div class="table-responsive">
                <table id="dataTable" class="table table-striped table-bordered table-sm" cellspacing="0" style="width:100%">
                      <thead>
                        <tr>
                            <th>#</th>
                            <th>Course Name</th>
                            <th>Course Code</th>
                            
                            <th>action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $a=1?>
                      @foreach ($model as $model)
                        <tr>
                            <td>{{$a++}}</td>    
                            <td>{{$model->course_name}}</td>
                            <td>{{$model->course_code}}</td>
                           
                            <td><a href="delete/{{$model->id}}" onclick="deleteMe(event)" class="btn udom-danger float-end btn-sm"><i class="bx bx-trash icon text-white"></i></a>
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
