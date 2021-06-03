<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="icon" href="../../images/fav.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Admin Dashboard</title>
    
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
                 <li  class="user">{{Session::get('admin_name')}}</li>
                 <li><img class="user-img" src="../../images/Ellipse.png"/></li>
                 <a href="{{URL::to('/admin/logout')}}"><li class="user">Logout</li></a>

                 
                 </ul>
        
            <?php $request = DB::table('requests')->count();?>     
                 
            </div>
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
                  <a class="button1 active" href="{{URL::to('/admin/dashboard')}}"><li class="first">Dashboard</li></a>
             <a class="button1" href="myroutine.html"> <li class="second">My Routine</li></a>
             <a class="button1" href="{{URL::to('/admin/allcourse')}}"> <li class="third">My courses</li></a>
             <a class="button1" href="{{URL::to('/admin/allteachers')}}"> <li class="sixth">Teachers</li></a>
             <a class="button1" href="{{URL::to('/admin/allclassroom')}}"> <li class="fifth">Classrooms</li></a>
              </ul>
              
              
          
          </div>
          
         
          <div class="col-sm-9">
               <div class="white-section nobg">
                   <div class="grad-section">
                   
                  
              <div class="col-sm-12">
              <p class="welcomeback">Welcome back Admin</p>
                  <p class="dept">Department Of CSE</p>
              </div>
              </div>
              
              <a href="">
              <div class="col-sm-4">
                  <div class="box1">
                  
                 
              <p class="Activ">Active Routines</p>
              <p class="four ">4</p>
              <p class="see">See All</p>
              </div>

               </div>
               </a>
              
              <a href="{{URL::to('/admin/allcourse')}}">
              <div class="col-sm-4">
                  <div class="box1">
                  
            <?php $courses = DB::table('course')->count();?>    
              <p class="Activ">Active Courses</p>
              <p class="four blue">{{$courses}}</p>
              <p class="see blue">See All</p>
              </div>

               </div>
               </a>

               <a href="">
              <div class="col-sm-4">
                  <div class="box1">
                  
            <?php $classrooms = DB::table('classroom')->count();?>      
              <p class="Activ">Active Classrooms</p>
              <p class="four orange">{{$classrooms}}</p>
              <p class="see orange">See All</p>
              </div>

               </div>
              
            </a>
              
              </div>
             
          
          </div>
          
          
    </div>
    </body>
</html>
    
    
    
<!--    white section ends-->
    
    
    