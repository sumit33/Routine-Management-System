<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
     <link rel="icon" href="../../images/fav.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="../../css/style.css">
    <title>All Classrooms</title>
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
                  <a class="button1" href="{{URL::to('/admin/dashboard')}}"><li class="first">Dashboard</li></a>
             <a class="button1" href="myroutine.html"> <li class="second">Routine</li></a>
             <a class="button1" href="{{URL::to('/admin/allcourse')}}"> <li class="third">Courses</li></a>
                  <a class="button1" href="{{URL::to('/admin/allteachers')}}">
                    <li class="sixth">Teachers</li>
                </a>
                  <a class="button1 active" href="{{URL::to('/admin/allclassroom')}}">
                    <li class="fifth">Classrooms</li>
                </a>
              </ul>
              
              
          
          </div>
          
         
          <div class="col-sm-8">
               <div class="white-section">
                   
                   <div class="myc-ctrl">
              <div class="col-sm-6">
              <p class="mycourses">All Classroom</p>
              </div>
              <div class="col-sm-6 pull-right">
              <a href="{{URL::to('/admin/addclassroom')}}"><p class="Add a new course">Add a new Classroom</p></a>
              </div>
                       
                       </div>
<!--            table starts-->
                   <div class="col-sm-12 nopad">
          <table class="tb1 allclassroom">
             
              <tr>
              <th  class="hash">#</th>
              <th class="titlee">Title</th>
              <th class="titlee"></th>
              <th class="titlee"></th>
              <th class="titlee"></th>
              <th class="titlee"></th>
              <th class="titlee"></th>
              <th class="titlee"></th>
              <th class="titlee"></th>
              <th class="titlee"></th>
              <th class="titlee"></th>
              <th class="titlee"></th>
              <th class="titlee"></th>
              <th class="titlee"></th>
              <th class="titlee"></th>
              <th class="titlee"></th>
                   

              <th  class="status">Status</th>
              <th  class="type">Type</th>
            
              <th class="type">Capacity</th>
              <th class="type">Action</th>
              </tr>
            <?php $classrooms = DB::table('classroom')->get(); $i=1;?> 
            <?php foreach($classrooms as $classroom) { ?>
              <tr>
                  <td>{{$i++}}</td>
                  <td colspan="15">{{$classroom->classroom_name}}</td>
                  <td>Active</td>
                  <td>{{$classroom->classroom_type}}</td>
                  <td>{{$classroom->capacity}}</td>
                  <td class="delete-btn btnn2"><p>Edit</p></td>
              
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