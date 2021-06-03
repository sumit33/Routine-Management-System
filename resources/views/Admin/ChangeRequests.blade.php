<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="icon" href="../../images/fav.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Change Request</title>

</head>

<body>
    <div class="header-bg">

        <div class="container-fluid nopad">
            <div class="header-container">
                <div class="container">
                    <div class="logo">
                        <div class="col-sm-6">
                            <a class="logo" href="#"> <img class="logo-ctrl" src="../../images/logo.PNG"> </a>
                        </div>


                        <div class="col-sm-2 nopad pull-right">
                            <ul class="user-list">
                                <li class="user">{{Session::get('admin_name')}}</li>
                                <li><img class="user-img" src="../../images/Ellipse.png" /></li>
                                <a href="{{URL::to('/admin/logout')}}"><li class="user">Logout</li></a>

                            </ul>



                        </div>
                        <?php $request = DB::table('requests')->count();?>     
 <div class="col-sm-2 pull-right">
 <a href="{{URL::to('/admin/changeRequests')}}">
                  <p class="rect-right">
                  Change Requests<span class="twell">{{$request}}</span>
                 </p>
        </a>
                 
                 
            </div>
                       
                    </div>

                </div>

            </div>

        </div>
    </div>

    <div class="main-section">


        <div class="col-sm-3">
           <ul class="cat-left">
                  <a class="button1" href="dashboard.html"><li class="first">Dashboard</li></a>
             <a class="button1" href="myroutine.html"> <li class="second">Routine</li></a>
             <a class="button1" href="{{URL::to('/admin/allcourse')}}"> <li class="third">Courses</li></a>
                  <a class="button1" href="{{URL::to('/admin/allteachers')}}">
                    <li class="sixth">Teachers</li>
                </a>
                  <a class="button1 " href="{{URL::to('/admin/allclassroom')}}">
                    <li class="fifth">Classrooms</li>
                </a>
              </ul>



        </div>


        <div class="col-sm-9">
            <div class="white-section nobg">
                
                <div class="col-sm-12">

                    <p class="addnewcourse">Change Requests</p>

                </div>

                <div class="col-sm-12">

                <?php foreach($classes as $class) { ?>
                    <?php if($class->class_time!=$class->req_class_time && $class->active_id==0) { ?>
                    <div class="box11">
                        <div class="col-sm-5">
                            <p class="active1" style="text-align: left">Reschedule :: {{$class->course_code}} on {{$class->req_class_time}}</p>
                              <p class="ict-gallery "style="text-align: left">No conflict</p>
                        </div>
                        
                        
                         <div class="col-sm-3 pull-right">
                      <a href="#"><p class="export btn2" style="margin-top: 0px;background: #46BAD3;

color: #fff">View Changes</p></a>
                             </div>
                             
                           <div class="col-sm-2 pull-right">
                      <a href="#"><p class="export btn2" style="margin-top: 0px;background: #F32828;margin-left: 45px;
    float: left;

color: #fff">Reject</p></a>
                           
                        </div>
                             
                             
                        
                         <div class="col-sm-2 pull-right">
                      <a href="#"><p class="export btn2 cancel" style="    margin-top: 0px;
    background: #34D993;
    color: #fff;
    float: left;
    margin-left: 50px;
">Accept</p></a>
                           
                        </div>
                        
                     


                    </div>
                    <?php } elseif($class->classroom_id!=$class->req_classroom_id && $class->active_id==0) { 
                        $classroom = DB::table('classroom')
                        ->where('classroom_id',$class->req_classroom_id)
                        ->select('classroom.classroom_name')
                        ->first();
                        ?> 

                        <div class="box11">
                        <div class="col-sm-5">
                            <p class="active1" style="text-align: left">Shifted :: {{$request->course_code}} on {{$classroom->classroom_name}}</p>
                              <p class="ict-gallery "style="text-align: left">No conflict</p>
                        </div>
                        
                        
                         <div class="col-sm-3 pull-right">
                      <a href="#"><p class="export btn2" style="margin-top: 0px;background: #46BAD3;

color: #fff">View Changes</p></a>
                             </div>
                             
                           <div class="col-sm-2 pull-right">
                      <a href="#"><p class="export btn2" style="margin-top: 0px;background: #F32828;margin-left: 45px;
    float: left;

color: #fff">Reject</p></a>
                           
                        </div>
                             
                             
                        
                         <div class="col-sm-2 pull-right">
                      <a href="#"><p class="export btn2 cancel" style="    margin-top: 0px;
    background: #34D993;
    color: #fff;
    float: left;
    margin-left: 50px;
">Accept</p></a>
                           
                        </div>
                        
                     


                    </div>
                    <?php } ?>
                <?php } ?>

                </div>

              
                </div>



            </div>


        </div>

    
    
</body>

</html>



<!--    white section ends-->
