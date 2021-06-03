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


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<style>
        .select2-multi{
            height: 300%; 
        }
    </style>

        <div class="col-sm-9">
            <div class="white-section nobg">
                <div class="col-sm-8">
                    <p class="addnewcourse">Add new Course</p>
                    <form  action="{{url('/addCourseInStudentDashboard')}}" method="post" enctype="multipart/form-data" >
                    {{ csrf_field() }} 
                        <label for="semester">Select Semester</label>

                        <select name="sem_id" id="sem_id" class="form-control">
                            
                        <?php
                        $all_semester=DB::table('semester')
                                            ->get();
                        foreach($all_semester as $v_semester){?>
                            <option value="{{$v_semester->sem_id}}">{{$v_semester->semester}}</option>
                        <?php } ?>

                        </select>
                        <i class="zmdi zmdi-caret-down"></i>

                        <label class="lblsem" for="courses">Select Course</label>

                        <select name="courses[]" id="course_id" class="form-control select2-multi" weight='20'  multiple="multiple">
                      

                        </select>
                        <br><br>
                        <input type="submit" value="Submit">
                    </form>

                </div>
            </div>


        </div>

        <script src="http://code.jquery.com/jquery-3.4.1.js"></script>

<script src="{{asset('js/select2.min.js')}}"></script>

<script>
                $(document).ready(function () {
                $('#sem_id').on('change', function () {
                let id = $(this).val();
                $('#course_id').empty();
                $('#course_id').append(`<option value="0" disabled selected>Processing...</option>`);
                $.ajax({
                type: 'GET',
                url: 'GetCourseID/' + id,
                success: function (response) {
                var response = JSON.parse(response);
                console.log(response);   
                $('#course_id').empty();
                //$('#course_id').append(`<option value="0" disabled selected>Select *</option>`);
                response.forEach(element => {
                    $('#course_id').append(`<option value="${element['course_id']}">${element['course_code']}</option>`);
                    });
                }
            });
        });
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
            $('.select2-multi').select2({
                tags: true,
            });
        });
    </script>

</div>


</div>


</div>
</body>

</html>


<!--    white section ends-->
