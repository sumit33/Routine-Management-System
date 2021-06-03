<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="icon" href="{{asset('images/fav.png')}}" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Courses</title>

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
                                <li class="user">{{Session::get('teacher_name')}}</li>
                                <li><img class="user-img" src="{{asset('images/Ellipse.png')}}" /></li>
                                <a href="{{URL::to('/teacher/logout')}}"><li class="user">Logout</li></a>

                            </ul>



                        </div>

                       
                    </div>

                </div>

            </div>

        </div>
    </div>

    <div class="main-section">
        <?php $teacher_id=Session::get('teacher_id'); ?>
        <div class="col-sm-3">
            <ul class="cat-left">
                <a class="button1" href="{{URL::to('/teacher/dashboard')}}">
                    <li class="first">Dashboard</li>
                </a>
                <a class="button1" href="myroutine.html">
                    <li class="second">My Routine</li>
                </a>
                <a class="button1 active" href="{{URL::to('/teacher/courses/'.$teacher_id)}}">
                    <li class="third">My Courses</li>
                </a>
               <a class="button1 req" href="{{URL::to('/teacher/changeRequest/'.$teacher_id)}}">
                    <li class="fourth">Change Request</li>
                </a>
            </ul>



        </div>
          
         
          <div class="col-sm-8">
               <div class="white-section">
                   
                   <div class="myc-ctrl">
              <div class="col-sm-6">
              <p class="mycourses">My Courses</p>
              </div>
              <div class="col-sm-6 pull-right">
              </div>
                       
                       </div>
<!--            table starts-->
                   <div class="col-sm-12 nopad">
          <table class="tb1">
             
            <tr>
              
              <th colspan="3" class="titlee">Title</th>
                   
                <th class="type">Status</th>
              <th  class="type">Type</th>
            
              <th class="type">Credit</th>
              
              </tr>
            <?php foreach($courses as $course) { ?>
              <tr>
                  
                  <td colspan="3">{{$course->course_code}}</td>
                                    <td >Active</td>

                  <td>{{$course->course_type}}</td>
                  <td>{{$course->credit}}</td>
              
              </tr>
              <?php } ?>
              
              </table>
          
          </div>
              
              </div>
             
          
          </div>
          
          
          
       
    
    
    </div>
<!--    white section ends-->
    
    
      </body>

</html>