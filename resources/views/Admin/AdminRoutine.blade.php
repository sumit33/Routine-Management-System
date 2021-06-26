<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="icon" href="{{asset('images/fav.png')}}" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Routine</title>

</head>

<body>
    <div class="header-bg">

        <div class="container-fluid nopad">
            <div class="header-container">
                <div class="container">
                    <div class="logo">
                        <div class="col-sm-6">
                            <a class="logo" href="#"> <img class="logo-ctrl" src="{{asset('images/logo.PNG')}}"> </a>
                        </div>


                        <div class="col-sm-1 nopad pull-right">
                            <ul class="user-list">
                                <li class="user">{{Session::get('admin_name')}}</li>
                                <li><img class="user-img" src="{{asset('images/Ellipse.png')}}" /></li>
                                <a href="{{URL::to('/student/logout')}}"><li class="user">Logout</li></a>
                            </ul>



                        </div>

                       
                    </div>

                </div>

            </div>

        </div>
    </div>

    <div class="main-section">

    <div class="col-sm-3">
              <ul class="cat-left">
              <a class="button1 active" href="{{URL::to('/admin/dashboard')}}"><li class="first">Dashboard</li></a>
             <a class="button1" href="{{URL::to('/admin/activeRoutine')}}"> <li class="second">Routine</li></a>
             <a class="button1" href="{{URL::to('/admin/allcourse')}}"> <li class="third">courses</li></a>
             <a class="button1" href="{{URL::to('/admin/allteachers')}}"> <li class="sixth">Teachers</li></a>
             <a class="button1" href="{{URL::to('/admin/allclassroom')}}"> <li class="fifth">Classrooms</li></a>
              </ul>
              
              
          
          </div>



        <div class="col-sm-8">
               <div class="white-section">
              <div class="col-sm-6">
              <p class="mycourses">My Routine</p>
              </div>
              

<!--            table starts-->
                   <div class="col-sm-12">
                   
                   
        <table class="tble">
        <tr>
        <td></td>
        <td>9AM-10AM</td>
        <td>10AM-11AM</td>
        <td>11AM-12PM</td>
        <td>12PM-1PM</td>
        <td>1PM-2PM</td>
        <td>2PM-3PM</td>
        <td>3PM-4PM</td>
        <td>4PM-5PM</td>
        
        </tr>
        <!-- Sunday -->
         <tr>
        <td>SUNDAY</td>
        <?php
                $sunday_class = DB::table('class')
                        ->join('course','class.course_id','=','course.course_id')
                        ->join('classroom','class.classroom_id','=','classroom.classroom_id')
                        ->join('teacher','course.teacher_id','=','teacher.teacher_id')
                        ->where('class_day',"Sunday")
                        ->where('sem_id',$sem_id)
                        ->get();
            $j = 9 ;
        ?>
        <?php foreach($sunday_class as $s_class) { ?>
            <?php $duration = $s_class->class_duration; 
                $time = Carbon\Carbon::createFromFormat('H:i:s', $s_class->class_time)->format('H');
                //9
            ?>
            <?php for($i=$j ; $i<$time ; $i++) { ?>
                <td></td>
            <?php } ?>
            <td colspan="{{$duration}}"><ul>
                <li>{{$s_class->course_code}}</li>
                <li>{{$s_class->teacher_name}}</li>
                <li>{{$s_class->classroom_name}}</li>
                
                </ul></td>
            <?php $j = $time+$duration; }  ?>
            <?php for($i=$j;$i<17;$i++) { ?>
                <td height="80px"><ul>
                <li></li>
                <li></li>
                <li></li>
                
                </ul></td>
            <?php } ?>
        </tr>
        <!-- Sunday -->
        <!-- Monday -->
        <tr>
        <td>MONDAY</td>
        <?php
                $monday_class = DB::table('class')
                        ->join('course','class.course_id','=','course.course_id')
                        ->join('classroom','class.classroom_id','=','classroom.classroom_id')
                        ->join('teacher','course.teacher_id','=','teacher.teacher_id')
                        ->where('class_day',"Monday")
                        ->where('sem_id',$sem_id)
                        //->groupBy('class_time','class.*','course.*')
                        ->get();
            $j = 9 ;
           // echo $sem_id;
        ?>
        <?php foreach($monday_class as $m_class) { ?>
            <?php $duration = $m_class->class_duration; 
                $time = Carbon\Carbon::createFromFormat('H:i:s', $m_class->class_time)->format('H');
            ?>
            <?php for($i=$j ; $i<$time ; $i++) { ?>
                <td></td>
            <?php } ?>
            <td colspan="{{$duration}}"><ul>
                <li>{{$m_class->course_code}}</li>
                <li>{{$m_class->teacher_name}}</li>
                <li>{{$m_class->classroom_name}}</li>
                
                </ul></td>
            <?php $j = $time+$duration;  }  ?>
            <?php for($i=$j;$i<17;$i++) { ?>
                <td height="80px"><ul>
                <li></li>
                <li></li>
                <li></li>
                
                </ul></td>
            <?php } ?>
        
        </tr>
            <!-- Monday -->
        <!-- Tuesday -->
        <tr>
        <td>TUESDAY</td>
        <?php
                $tues_class = DB::table('class')
                        ->join('course','class.course_id','=','course.course_id')
                        ->join('classroom','class.classroom_id','=','classroom.classroom_id')
                        ->join('teacher','course.teacher_id','=','teacher.teacher_id')
                        ->where('class_day',"Tuesday")
                        ->where('sem_id',$sem_id)
                        ->get();
            $j = 9 ;
        ?>
        <?php foreach($tues_class as $t_class) { ?>
            <?php $duration = $t_class->class_duration; 
                $time = Carbon\Carbon::createFromFormat('H:i:s', $t_class->class_time)->format('H');
            ?>
            <?php for($i=$j ; $i<$time ; $i++) { ?>
                <td></td>
            <?php } ?>
            <td colspan="{{$duration}}"><ul>
                <li>{{$t_class->course_code}}</li>
                <li>{{$t_class->teacher_name}}</li>
                <li>{{$t_class->classroom_name}}</li>
                
                </ul></td>
            <?php $j = $time+$duration;  }  ?>
            <?php for($i=$j;$i<17;$i++) { ?>
                <td height="80px"><ul>
                <li></li>
                <li></li>
                <li></li>
                
                </ul></td>
            <?php } ?>
        
        
        </tr>
        <!-- Tuesday -->
        
        <tr>
        <td>WEDNESDAY</td>
        <?php
                $wed_class = DB::table('class')
                        ->join('course','class.course_id','=','course.course_id')
                        ->join('classroom','class.classroom_id','=','classroom.classroom_id')
                        ->join('teacher','course.teacher_id','=','teacher.teacher_id')
                        ->where('class_day',"Wednesday")
                        ->where('sem_id',$sem_id)
                        ->get();
            $j = 9 ;
            //echo $monday_class;
        ?>
        <?php foreach($wed_class as $w_class) { ?>
            <?php $duration = $w_class->class_duration; 
                $time = Carbon\Carbon::createFromFormat('H:i:s', $w_class->class_time)->format('H');
                
            ?>
            <?php for($i=$j ; $i<$time ; $i++) { ?>
                <td></td>
            <?php } ?>
            <td colspan="{{$duration}}"><ul>
                <li>{{$w_class->course_code}}</li>
                <li>{{$w_class->teacher_name}}</li>
                <li>{{$w_class->classroom_name}}</li>
                
                </ul></td>
            <?php $j = $time+$duration;  }  ?>
            <?php for($i=$j;$i<17;$i++) { ?>
                <td height="80px"><ul>
                <li></li>
                <li></li>
                <li></li>
                
                </ul></td>
            <?php } ?>
        
        </tr>


        <tr>
        <td>THURSDAY</td>
        <?php
                $thurs_class = DB::table('class')
                        ->join('course','class.course_id','=','course.course_id')
                        ->join('classroom','class.classroom_id','=','classroom.classroom_id')
                        ->join('teacher','course.teacher_id','=','teacher.teacher_id')
                        ->where('class_day',"Thursday")
                        ->where('sem_id',$sem_id)
                        ->get();
            $j = 9 ;
            //echo $monday_class;
        ?>
        <?php foreach($thurs_class as $th_class) { ?>
            <?php $duration = $th_class->class_duration; 
                $time = Carbon\Carbon::createFromFormat('H:i:s', $th_class->class_time)->format('H');
                
            ?>
            <?php for($i=$j ; $i<$time ; $i++) { ?>
                <td></td>
            <?php } ?>
            <td colspan="{{$duration}}"><ul>
                <li>{{$th_class->course_code}}</li>
                <li>{{$th_class->teacher_name}}</li>
                <li>{{$th_class->classroom_name}}</li>
                
                </ul></td>
            <?php $j = $time+$duration;  }  ?>
            <?php for($i=$j;$i<17;$i++) { ?>
                <td height="80px" ><ul>
                <li></li>
                <li></li>
                <li></li>
                
                </ul></td>
            <?php } ?>
        
        </tr>
        
        
        
        </table>
                   </div>
              
              </div>
             
          
          </div>
          
          
          
       
    
    
    </div>
</body>

</html>