<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="icon" href="{{asset('images/fav.png')}}" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Student Dashboard</title>

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
                                <li class="user">{{Session::get('name')}}</li>
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
    <?php $student_id = Session::get('student_id');
          $active_id = Session::get('active_id');
    ?>
        <div class="col-sm-3">
            <ul class="cat-left">
                <a class="button1" href="{{URL::to('/student/dashboard')}}">
                    <li class="first">Dashboard</li>
                </a>
                <a class="button1" href="{{URL::to('/student/Routine')}}">
                    <li class="second">My Routine</li>
                </a>
                <a class="button1 active" href="{{URL::to('/student/courses/'.$student_id)}}">
                    <li class="third">My courses</li>
                </a>
                <?php if($active_id) { ?>
                    <a class="button1" href="{{URL::to('/changeRequest/'.$student_id)}}">
                    <li class="fourth">Change requests</li>
                </a>
                <?php } ?>
                
            </ul>



        </div>


<?php $student_id=Session::get('student_id'); ?>
         
          <div class="col-sm-8">
               <div class="white-section">
                   
                   <div class="myc-ctrl">
              <div class="col-sm-6">
              <p class="mycourses">My Courses</p>
              </div>
              <div class="col-sm-6 pull-right">
              <a href="{{URL::to('/student/add_new_course/'.$student_id)}}"><p class="Add a new course">Add a new course</p></a>
              </div>
                       
                       </div>
<!--            table starts-->
                   <div class="col-sm-12 nopad">
          <table class="tb1">
             
              <tr>
              
              <th colspan="3" class="title">Title</th>
                   

              <th  class="type">Type</th>
            
              <th class="type">Credit</th>
              <th class="type">Action</th>
              </tr>
              <?php foreach ($courses as $course) { ?>
              <tr>
                  <td colspan="3">{{$course->course_code}}</td>
                  <td>{{$course->course_type}}</td>
                  <td>{{$course->credit}}</td>
                  <td class="delete-btn">
									<a class="btn btn-danger" href="{{URL::to('/student/delete-course/'.$course->course_id)}}" id='delete'>
										Delete
									</a>
								</td>              
              </tr>
              <?php } ?>
              </table>
          
          </div>
              
              </div>
             
          
          </div>
          
          

          </div>


</div>


</div>
</body>

</html>