<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="icon" href="../../images/fav.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Routine</title>

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


                        <div class="col-sm-1 nopad pull-right">
                            <ul class="user-list">
                                <li class="user">{{Session::get('admin_name')}}</li>
                                <li><img class="user-img" src="../../images/Ellipse.png" /></li>
                                <a href="{{URL::to('/admin/logout')}}"><li class="user">Logout</li></a>
                            </ul>



                        </div>
                    <?php $request = DB::table('requests')
                        ->where('active_id',0)
                        ->count();?>
<div class="col-sm-3 pull-right">
              <p class="rect-right">
                  Change Requests<span class="twell">{{$request}}</span>
                 </p>
        
                 
                 
            </div>
                       
                    </div>

                </div>

            </div>

        </div>
    </div>

    <div class="main-section">


    <div class="col-sm-3">
            <ul class="cat-left">
                  <a class="button1" href="{{URL::to('/admin/dashboard')}}"><li class="first">Dashboard</li></a>
             <a class="button1 active" href="{{URL::to('/admin/activeRoutine')}}"> <li class="second">Routine</li></a>
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
               
                <div class="col-sm-6">

                    <p class="addnewcourse">Active Routine</p>

                </div>
                <div class="col-sm-4 pull-right">

                    <a href="createnewroutine.html"><p class="Add a new course">Create new Routine</p></a>

                </div>

            <?php 
                $semesters = DB::table('semester')->get(); 
            
            ?>
                
            <?php foreach($semesters as $semester) { ?>
                <?php $course = DB::table('course')
                                ->where('sem_id',$semester->sem_id)
                                ->count(); ?>
                <div class="col-sm-12">
                    <div class="box11">
                       
                        <div class="col-sm-3">
                            <p class="coursecode" style="text-align: left">Semester {{$semester->semester}}</p>
                            <p class="ict-gallery "style="text-align: left">{{$course}} courses</p>
                           
                        </div>
 
                       
                        <div class="col-sm-3 pull-right">
                            <a href="{{URL::to('/admin/seeRoutine/'.$semester->sem_id)}}"><p class="export btn2" style="margin-top: 0px">See Routine</p></a>
                           </div>
                        <div class="col-sm-3 pull-right">
                            <p class="last-updated " style="text-align: right">Last Updated 2 days ago</p>
                           </div> 
                    </div>

                </div>
              
            <?php } ?>

                </div>



            </div>


        
    

    </div>
</body>

</html>



<!--    white section ends-->
