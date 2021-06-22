<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
     <link rel="icon" href="../../images/fav.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="../../css/style.css">
    <title>All Courses</title>
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
            
             <div class="col-sm-2 pull-right">
                 <ul class="user-list">
                 <li  class="user">{{Session::get('admin_name')}}</li>
                 <li><img class="user-img" src="../../images/Ellipse.png"/></li>
                 <a href="{{URL::to('/admin/logout')}}"><li class="user">Logout</li></a>

                 
                 </ul>
        
                 
                 
            </div>
            <?php $request = DB::table('requests')
            ->where('active_id',0)
            ->count();?>     

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
                  <a class="button1" href="{{URL::to('/admin/dashboard')}}"><li class="first">Dashboard</li></a>
             <a class="button1" href="{{URL::to('/admin/activeRoutine')}}"> <li class="second">Routine</li></a>
             <a class="button1 active" href="{{URL::to('/admin/allcourse')}}"> <li class="third">Courses</li></a>
                  <a class="button1" href="{{URL::to('/admin/allteachers')}}">
                    <li class="sixth">Teachers</li>
                </a>
                  <a class="button1" href="{{URL::to('/admin/allclassroom')}}">
                    <li class="fifth">Classrooms</li>
                </a>
              </ul>
              
              
          
          </div>
          
         
          <div class="col-sm-9">
               <div class="white-section">
                   
                   <div class="myc-ctrl1">
              <div class="col-sm-6">
              <p class="mycourses">All Courses</p>
              </div>
              <div class="col-sm-6 pull-right">
              <a href="{{URL::to('/admin/addCourse')}}"><p class="Add a new course">Add a new course</p></a>
              </div>
                       
                       </div>
<!--            table starts-->
                   <div class="col-sm-12 nopad">
          <table class="tb1">
             
              <tr>
              <th  class="titlee" style="padding-right:  199px !important">Course Code</th>
                   

              <th  class="status">Status</th>
              <th  class="type">Type</th>
            
              <th class="type">Credit</th>
              <th colspan="2" class="type" style="text-align: center;">Action</th>
              </tr>
              <?php $courses = DB::table('course')->get(); ?>
                <?php foreach($courses as $course) { ?>
                <?php $course_id = $course->course_id; ?>
              <tr>
                  <td >{{$course->course_code}}</td>
                  <td>Active</td>
               
                  <td>{{$course->course_type}}</td> 
                  <td>{{$course->credit}}</td>
                  <td class="delete-btn1"><a href="{{URL::to('/assignTeacher/'.$course_id)}}"><p>Assign</p></a> <a href=""><p>Edit</p></a></td>
              
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