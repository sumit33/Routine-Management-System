<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="icon" href="../../images/fav.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Add new classroom</title>

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
                  <a class="button1" href="{{URL::to('/admin/dashboard')}}"><li class="first">Dashboard</li></a>
             <a class="button1 active" href="myroutine.html"> <li class="second">Routine</li></a>
             <a class="button1" href="{{URL::to('/admin/allcourse')}}"> <li class="third">Courses</li></a>
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
                    <p class="addnewcourse">Add new Classroom</p>
                    <form action="{{url('/admin/save-classroom')}}" method="post">
                        {{ csrf_field()}}
                        <label class="lblsem" for="name">Name</label>

                       <input type="text" id="name" name="classroom_name" placeholder="Room Name"> 
                        
                        <label class="lblsem" for="capacity">Capacity</label>
                       <input type="text" id="capacity" name="capacity" placeholder="Room Capacity">
                        
                        

                        <label class="lblsem" for="type">Type</label>

                        <select name="classroom_type" id="cars">
                              <option value="Lab">Lab</option>
                            <option value="Theory">Theory</option>
                          

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
