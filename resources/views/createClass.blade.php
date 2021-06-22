<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="icon" href="../../images/fav.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Addnewcourse</title>

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
                                <li class="user">Student</li>
                                <li><img class="user-img" src="../../images/Ellipse.png" /></li>

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
                <a class="button1" href="student-dashboard.html">
                    <li class="first">Dashboard</li>
                </a>
                <a class="button1" href="myroutine.html">
                    <li class="second">My Routine</li>
                </a>
                <a class="button1 active" href="addanewcourse.html">
                    <li class="third">My courses</li>
                </a>
                <a class="button1 req" href="changerequest-student.html">
                    <li class="fourth active">Change Request</li>
                </a>
               
            </ul>



        </div>


        <div class="col-sm-9">
            <div class="white-section nobg">
                <div class="col-sm-8">
                    <p class="addnewcourse">Add new Class</p>
                    <form action="{{url('/saveClass')}}" method="post" enctype="multipart/form-data" >
                        {{csrf_field()}}
                        <label for="semester">Select Semester</label>

                            <select name="course_id" id="cars" class="form-control">
                            <?php $courses = DB::table('course')->get(); ?>
                            <?php foreach($courses as $course) { ?>
                                <option value="{{$course->course_id}}">{{$course->course_code}}</option>
                            <?php } ?>

                            </select>

                            <label class="classroom" for="classroom">Classroom</label>

                        <select name="classroom_id" id="cars">
                        <?php  $all_classroom = DB::table('classroom')
                    ->get(); ?>
                        <?php foreach($all_classroom as $classroom){ ?>
                            <option value="{{$classroom->classroom_id}}">{{$classroom->classroom_name}}</option>
                        <?php } ?>

                        </select>

                        <label class="Day" for="Day">Day</label>

                        <select name="class_day" id="cars">
                      
                            <option value="Sunday">Sunday</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>

                        </select>

                        <label class="time-opt" for="semester">Time</label>

                       <input type="time" id="time-opt" name="class_time" >

                       <label class="time-opt" for="semester">Duration in hour</label>

                       <input type="number" id="time-opt" name="class_duration" placeholder = "1" >
                        <br><br>
                        <input type="submit" value="Submit">
                    </form>

                </div>
            </div>


        </div>
    </div>
    

</body>

</html>



<!--    white section ends-->
