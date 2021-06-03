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
                <a class="button1 active" href="myroutine.html">
                    <li class="second">My Routine</li>
                </a>
                <a class="button1" href="{{URL::to('/student/courses/'.$student_id)}}">
                    <li class="third">My courses</li>
                </a>
                <?php if($active_id) { ?>
                    <a class="button1" href="{{URL::to('/changeRequest/'.$student_id)}}">
                    <li class="fourth">Change requests</li>
                </a>
                <?php } ?>
                
            </ul>



        </div>



        <div class="col-sm-8">
               <div class="white-section">
              <div class="col-sm-6">
              <p class="mycourses">My Routine</p>
              </div>
              <div class="col-sm-6 pull-right">
              <a href="#"><p class="export">Export</p></a>
              </div>
<!--            table starts-->
                   <div class="col-sm-12">
                   
                   
                   <table class="tble">
        <tr>
        <td></td>
        <td>9AM-10AM</td>
        <td>10AM-11AM</td>
        <td>11AM-12PM</td>
        <td>12PM-1PM</td>
        <td>1PM-2PM</td>
        <td>2PM-3PM</td>
        <td>4PM-5PM</td>
        
        </tr>
         <tr>
        <td>SUNDAY</td>
        <td colspan="3"><ul>
            <li>CSE134</li>
            <li>Teacher Name</li>
            <li>IICT 303</li>
            
            </ul></td>
        <td></td>
        <td><ul>
            <li>CSE134</li>
            <li>Teacher Name</li>
            <li>IICT 303</li>
            
            </ul></td>
        <td></td>
        <td></td>
       
        
        </tr>
        <tr>
        <td>MONDAY</td>
        <td></td>
        <td></td>
        <td><ul>
            <li>CSE134</li>
            <li>Teacher Name</li>
            <li>IICT 303</li>
            
            </ul></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        
        </tr>
        <tr>
        <td>TUESDAY</td>
        <td></td>
        <td></td>
        <td></td>
            <td></td>
        <td colspan="3"><ul>
            <li>CSE134</li>
            <li>Teacher Name</li>
            <li>IICT 303</li>
            
            </ul></td>
        
        
        </tr>
        
        
        <tr>
        <td>WEDNESDAY</td>
        <td colspan="3"><ul>
            <li>CSE134</li>
            <li>Teacher Name</li>
            <li>IICT 303</li>
            
            </ul></td>
        <td></td>
        <td><ul>
            <li>CSE134</li>
            <li>Teacher Name</li>
            <li>IICT 303</li>
            
            </ul>   </td>
        <td></td>
        <td></td>
        
        </tr>
        <tr>
        <td>THURSDAY</td>
        <td><ul>
            <li>CSE134</li>
            <li>Teacher Name</li>
            <li>IICT 303</li>
            
            </ul></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        
        </tr>
        
        
        
        </table>
                   </div>
              
              </div>
             
          
          </div>
          
          
          
       
    
    
    </div>
</body>

</html>