<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="icon" href="../../images/fav.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Add new course</title>

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

        <?php

            $semesters = DB::table('semester')->get();
        ?>
        <div class="col-sm-9">
            <div class="white-section nobg">
                <div class="col-sm-8">
                    <p class="addnewcourse">Add new Course</p>
                    <form action="{{URL::to('/admin/save-course')}}" method="post">
                        {{csrf_field()}}
                        <label class="lblsem" for="title">Title</label>

                       <input type="text" id="title" name="title" placeholder="Course Title"> 
                        
                        <label class="lblsem" for="course_code">Courde Code</label>

                       <input type="text" id="course_code" name="course_code" placeholder="Course Code"> 

                       <label class="lblsem" for="semester">Semester</label>

                        <select name="semester" id="cars">
                        <?php foreach($semesters as $semester) { ?>
                            <option value="{{$semester->sem_id}}">{{$semester->semester}}</option>
                        <?php } ?>
                        </select>   
                        <label class="lblsem" for="credit">Credit</label>

                       <input type="text" id="credit" name="credit" placeholder="Course Credit">

                        <label class="lblsem" for="type">Course Type</label>

                        <select name="type" id="cars">
                            <option value="Theory">Theory</option>
                            <option value="Lab">Lab</option>

                        </select>
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
