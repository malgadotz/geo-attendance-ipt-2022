@extends('layouts.admin')

@section('content')

    <div class="row justify-content-stretch">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h6>{{ __('My Sessions') }} </h6>
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
                            <th>Session</th>
                            <th>Instructor Name</th>
                            <th>Venue</th>
                            <th>Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Now</th>
                            <th class="text-center">Status</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $a=1?>
                      @foreach ($model as $model)
                      <?php $course=App\Models\StudentCourse::where('course_id', $model->course_id)->get();
                      
                      foreach($course as $course)
                      $userTimezone = "Africa/Nairobi";
                      $timezone = new DateTimeZone( $userTimezone );
                       
                      $date = new DateTime(date('h:i:s'),$timezone);
                      $crrentSysDate = new DateTime("now", new DateTimeZone($userTimezone));
                      $userDefineDate = $crrentSysDate->format('h:i:s A');
                      $leo = $crrentSysDate->format('Y-m-d');
                      $leotena = date_create($leo);
                      $sessionDate = date_create($model->date);

                      $dateTimeObject1 = date_create($userDefineDate);
                      $dateTimeObject2 = date_create($model->start_time);
                      $dateTimeObject3 = date_create($model->end_time);
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
                      @if($model->program_id == $program && $yos == $model->year_level && $leotena <= $sessionDate)
                        <tr>
                            <td>{{$a++}}</td>    
                            <td>{{$model->course}}</td>
                            <td>{{$model->code}}</td>
                            <td>{{$model->activity_name}}</td>
                            <td>{{$model->first}} {{$model->last}}</td>
                            <td>{{$model->venue}}</td>
                            <td>{{$model->date}}</td>
                            <td>{{$model->start_time}}</td>
                            <td>{{$model->end_time}}</td>
                            <td>
                             {{ $crrentSysDate->format('H:i:s')}} 
                            </td>
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
              <td>
                                    @if($dateTimeObject1 > $dateTimeObject3)
                              <a href="{{url('#')}}" class="btn btn-danger m-auto float-left btn-sm"><i class="bx bx-clock icon text-white"></i> Ended</a>
                                    @elseif( $dateTimeObject1 < $dateTimeObject2)
                              <a href="{{url('#')}}" class="btn udom-danger text-white m-auto float-left btn-sm"><i class="bx bx-clock icon text-white"></i> Pending</a>
                                    @else
                              <a href="{{url('student/attendence/add')}}/{{$model->id}}" class="btn btn-success m-auto float-left btn-sm"><i class="bx bx-clock icon text-white"></i> Attend</a>
                                    @endif
                            </td>
              @else
              <td class="text-center text-primary ">
              <?php    echo  '  Begins in : '. $interval3->days. ' Days';?></td>
            </td>
           <td>
           <a href="{{url('#')}}" class="btn udom-danger text-white m-auto  btn-sm"><i class="fa fa-lock icon text-white"></i> </a>
           </td>                
                            @endif
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
