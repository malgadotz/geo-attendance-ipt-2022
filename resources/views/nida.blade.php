@extends('layouts.admin')

@section('content')

    <div class="row justify-content-stretch">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h6>{{ __('NIDA INFORMATION') }}</h6>
                    <a href="{{url('student/sms/view')}}" class="btn btn-primary float-end">{{ __('Enter NIN') }}</a>
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
                            <th>First Name</th>
                            <th>MiddleName Code</th>
                            <th>LastName</th>
                            <th>DOB</th>
                            <th>Gender</th>
                            <th>NATIONALITY</th>
                            <th>NationalIDNumber</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $a=1;?>
                        <tr>
                            <td>{{$a++}}</td>    
                            <td>{{$model['FirstName']}}</td>
                            <td>{{$model['MiddleName']}}</td>
                            <td>{{$model['LastName']}}</td>
                            <td>{{$model['DateofBirth']}}</td>
                            <td>{{$model['Sex']}}</td>
                            <td>{{$model['NATIONALITY']}}</td>
                            <td>{{$model['NIN']}}</td>
                        </tr>
                    </tbody>
                </table>
                </div> 
                
            </div>
        </div>
    </div>
</div>
@endsection
