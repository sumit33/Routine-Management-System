
<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
    
    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('css/loginstyle.css')}}">
<link rel="icon" href="{{asset('images/fav.png')}}" type="image/gif" sizes="16x16">




</head>
<body>

<div class="left_side">
	<div class="left_text">
	<h2>Welcome to</h2>
	<h1>SUST Routine <br> Management System</h1>
	</div>
</div>

<div class="right_side">
	<div class="form_div">
		<h2>Sign In</h2>
		<p>Sign In As</p>
     <form method="POST" action="{{url('student/student-login')}}">
        {{ csrf_field() }}
         <div class="col-sm-12 nopad">
         
         
         <div class="col-sm-4 nopad">
         
         
		<a href="login.html" class="btn-btn">Student</a>
         
         </div>
		 <div class="col-sm-4 nopad">
         <a href="{{URL::to('/teacher/login')}}" class="teacher_btn">Teacher</a>
         </div>
             
             </div>
		<p>Registration Number</p>
		<input type="text" name="student_reg" required>

		<p>Password</p>
		<input type="password" name="student_password" required>

        <div class="container-login100-form-btn">
						<button class="btn-btn-btn">
							Proceed as Student <i style="margin-left: 28px;" class="fa fa-arrow-right"></i>
						</button>
					</div>
                    

		<br>
		  <!-- <a href="" class="btn-btn-btn">Proceed as CR<i style="margin-left: 28px;" class="fa fa-arrow-right"></i></a>
         <a  href="{{URL::to('student/student-login')}}" style="    width: 218px;
    margin-left: 10px;" class="btn-btn-btn">Proceed as Student<i class="fa fa-arrow-right"></i></a> -->

		<p><a href="#">Forgot Password</a></p>
</form>
	</div>

</div>


</body>
</html>