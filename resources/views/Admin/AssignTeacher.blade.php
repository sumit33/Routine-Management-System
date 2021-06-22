<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="icon" href="../../images/fav.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="../../css/style.css">
    <title>AssignTeacher</title>

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
                        <div class="col-sm-2 pull-right">
                        <?php $request = DB::table('requests')
            ->where('active_id',0)
            ->count();?> 
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
                  <a class="button1" href="{{URL::to('/admin/dashboard')}}"><li class="first">Dashboard</li></a>
             <a class="button1 " href="{{URL::to('/admin/activeRoutine')}}"> <li class="second">Routine</li></a>
             <a class="button1 active" href="{{URL::to('/admin/allcourse')}}"> <li class="third">Courses</li></a>
                  <a class="button1" href="{{URL::to('/admin/allteachers')}}l">
                    <li class="sixth">Teachers</li>
                </a>
                  <a class="button1 " href="{{URL::to('/admin/allclassroom')}}">
                    <li class="fifth">Classrooms</li>
                </a>
              </ul>


        </div>


        <div class="col-sm-9">
            <div class="white-section nobg">
                <div class="col-sm-8">
                    <p class="addnewcourse">Assign teacher to {{$course->course_code}}</p>
                    <?php $course_id = $course->course_id; ?>
                    <form action="{{url('/saveAssignTeacher/'.$course_id)}}" method="post">
                       {{csrf_field()}}
                        <label class="lblsem" for="semester">Select Teacher</label>
                    <?php $teachers = DB::table('teacher')
                                    ->where('admin',0)
                                    ->get();?>
                        
                       <select name="teacher_id" id="cars">
                       <?php foreach($teachers as $teacher) { ?>
                            <option value="{{$teacher->teacher_id}}">{{$teacher->teacher_name}}</option>
                            <?php } ?>

                        </select> 
                        
                        
                        <!-- <label class="lblsem" for="semester">Select Classroom</label>

                       <select name="semester" id="cars">
                            <option value="number">IICT Gallery-2</option>
                            <option value="number">IICT Gallery-3</option>

                        </select> -->
                        
                        
                        <br><br>
                        <input type="submit" value="Save">
                    </form>

                </div>
            </div>


        </div>
    </div>

</body>

</html>



<!--    white section ends-->
