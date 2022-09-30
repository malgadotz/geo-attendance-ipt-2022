@extends('layouts.admin')

@section('content')

    <div class="row justify-content-stretch">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h6>{{ __('My Sessions') }}</h6>
                    @if( session('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                    @endif
                    @if (Auth::user()->role == 'Staff')
                    <a href="{{url('staff/session/add')}}" class="btn btn-primary float-end">{{ __('Add Seesion') }}</a>
                    @endif
                </div>

                <div class="card-body">
                <div class="table-responsive">
                <table id="table" class="table table-striped table-bordered table-sm" cellspacing="0" style="width:100%">
                      <thead>
                        <tr>
                            <th>#</th>
                            <th>Course Name</th>
                            <th>Code</th>
                            <th>Session Name</th>
                            <th>Program</th>
                            <th>YOS</th>
                            <th>Venue</th>
                            <th>Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th class="text-center">Status</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $a=1?>
                      @foreach ($model as $model)
                       <?php
                                                $userTimezone = "Africa/Nairobi";
                                                $timezone = new DateTimeZone( $userTimezone );
                                                 
                                                $date = new DateTime(date('h:i:s'),$timezone);
                                                $crrentSysDate = new DateTime("now", new DateTimeZone($userTimezone));
                                                $userDefineDate = $crrentSysDate->format('h:i:s A');
                
                                                $leo = $crrentSysDate->format('Y-m-d');
                                                $leotena = date_create($leo);
                                               
                                                $dateTimeObject1 = date_create($userDefineDate);
                                                
                                                $dateTimeObject2 = date_create($model->start_time);
                                                $dateTimeObject3 = date_create($model->end_time);
                                                
                                                $todayDate = date_create($crrentSysDate->format('Y-m-d'));
                                                $sessionDate = date_create($model->date);

                                                $interval1 = date_diff($dateTimeObject2, $dateTimeObject1); 
                                                $interval2 = date_diff($dateTimeObject3,$dateTimeObject1 ); 
                                                $interval3 = date_diff($leotena,$sessionDate); 
                          
                                                $minutes1 = $interval1->days * 24 * 60;
                                                $minutes1 += $interval1->h * 60;
                                                $minutes1 += $interval1->i;
                                                $minutes2 = $interval2->days * 24 * 60;
                                                $minutes2 += $interval2->h * 60;
                                                $minutes2 += $interval2->i;  
                                ?>
                      @if($leotena <= $sessionDate)
                        <tr>
                            <td>{{$a++}}</td>    
                            <td>{{$model->course}}</td>
                            <td>{{$model->code}}</td>
                            <td>{{$model->activity_name}}</td>
                            <td>{{$model->program}}</td>
                            <td>{{$model->year_level}}</td>
                            <td>{{$model->venue}}</td>
                            <td>{{$model->date}}</td>
                            <td>{{$model->start_time}}</td>
                            <td>{{$model->end_time}}</td>
                            
                               
                             @if($leotena == $sessionDate)
                             <?php 
                             if( $dateTimeObject1 < $dateTimeObject2 ){
              ?>
                  <td class="text-center text-warning "> Starts in {{$minutes1}}  mins        
                <?php }
                else if ($dateTimeObject1 > $dateTimeObject3) {?>
              <td class="text-center text-danger ">
                <?php    echo '  ended ' .$minutes2.' mins ago';?> </td>  
               <?php }else if($dateTimeObject1 > $dateTimeObject2 && $dateTimeObject1 < $dateTimeObject3){?>
              <td class="text-center text-info ">
              <?php    echo  '  Session ends After: '. $minutes2;}?></td>
                            
              @elseif($leotena > $sessionDate)
              <td class="text-center text-primary ">
              <?php    echo  '  Begivvns in : '. $interval3->days. ' Dayss';?></td>
              
            </td>
            @else
              <td class="text-center text-primary ">
              <?php    echo  '  Ended  : '. $interval3->days. ' Days'.'  Ago ';?></td>
              
            </td>
            @endif
              <td>
                            @if (Auth::user()->role != 'Student')
                            <a href="delete/{{$model->id}}" onclick="deleteMe(event)" class="btn udom-danger float-end btn-sm"><i class="bx bx-trash icon text-white"></i></a>
                              <a href="edit/{{$model->id}}" class=                               "btn udom-info m-auto float-left btn-sm"><i class="bx bx-edit icon text-white"></i></a>
                              @else
                              <a href="{{url('student/attendence/add')}}/{{$model->id}}" class=                               "btn udom-alert m-auto float-left btn-sm"><i class="bx bx-clock icon text-white"></i> Attend</a>
                              @endif
                            </td>
                          

                        </tr>
                        @endif

                        @endforeach
                    </tbody>
                </table>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
