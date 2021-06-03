<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Student;
use App\StudentHasCourse;
use App\Courses;
session_start();

class StudentController extends Controller
{
    public function login()
    {
        return view('Students.studentLogin');
    }
    public function loginPost(Request $request)
    {
        $student_reg = $request->student_reg;
        //echo $student_reg;
        $password = $request->student_password;

        $result1=DB::table('student')
                ->where('student_reg',$student_reg)
                ->where('password',$password)
                ->first();

        if($result1){
            
            Session::put('name',$result1->student_name);
            Session::put('student_id',$result1->student_id);
            Session::put('active_id',$result1->active_id);
            return Redirect::to('/student/dashboard');               
        }
        else{

            Session::put('message','Reg or password invalid');
            return Redirect::to('/student/login');

        }
    }
    public function logout()
    {
    	Session::flush();
    	return Redirect::to('student/login');
    }
    public function studentDashboard()
    {
        $student_id = Session::get('student_id');
        $classes = DB::table('class')
                ->join('student_has_course','class.course_id','=','student_has_course.course_id')
                ->join('course','class.course_id','=','course.course_id')
                ->join('classroom','class.classroom_id','=','classroom.classroom_id')
                ->select('student_has_course.*','class.*','course.course_code','classroom.classroom_name')
                ->where('student_has_course.student_id',$student_id)
                ->get();
                //return $classes;
        return view('Students.student-dashboard')->with('classes',$classes);
    }

    public function allcourses($student_id)
    {
        
        $courses = DB::table('student_has_course')
            ->join('course','student_has_course.course_id','=','course.course_id')
            ->select('student_has_course.course_id','course.*')
            ->where('student_has_course.student_id',$student_id)
            ->get();

        // $class = DB::table('class')
        //         ->join('student_has_course','class.course_id','=','student_has_course.course_id')
        //         ->select('student_has_course.*','class.*')
        //         ->where('student_has_course.student_id',$student_id)
        //         ->get();
        // return $class;
        return view('Students.AllCourses')->with('courses',$courses);
    }

    public function AddNewCourse($student_id)
    {
        return view('Students.AddNewCourse');
    }
    public function GetCourseID($id){
        echo json_encode(DB::table('course')
                            ->where('sem_id', $id)
                            ->get());
    }

    public function addCourseInStudentDashboard(Request $request)
    {
        $id = Session::get('student_id');
        $abc = Student::find($id);
        $abc->courses()->sync($request->courses,false);
        return Redirect('/student/dashboard');
    }

    public function deleteCourse($course_id)
    {
        $id = Session::get('student_id');
        DB::table('student_has_course')
            ->where('student_has_course.student_id',$id)
            ->where('student_has_course.course_id',$course_id)
            ->delete();   
        return Redirect::back();
    }

    public function changeForm($class_id)
    {
        $class = DB::table('class')
                ->where('class.class_id',$class_id)
                ->select('class.*')
                ->first();
        return view('CR.changeForm')->with('class',$class);
    }

    public function saveRequest(Request $request,$class_id)
    {
        DB::table('requests')
            ->where('requests.class_id',$class_id)
            ->where('requests.active_id',0)
            ->delete();
        $data = array();
        $data['class_id']=$class_id;
        $data['req_classroom_id']=$request->req_classroom;
        $data['req_class_time'] = $request->req_class_time;

        DB::table('requests')->insert($data);
        
        return Redirect::to('/student/dashboard');
    }

    public function changeRequest($student_id)
    {
        $classes = DB::table('class')
                ->join('student_has_course','class.course_id','=','student_has_course.course_id')
                ->join('course','class.course_id','=','course.course_id')
                ->join('classroom','class.classroom_id','=','classroom.classroom_id')
                ->join('requests','class.class_id','=','requests.class_id')
                ->select('student_has_course.*','class.*','course.course_code','classroom.classroom_name','requests.*')
                ->where('student_has_course.student_id',$student_id)
                ->get();
         
        return view('CR.changeRequests')->with('requests',$classes);
    }

    public function showRoutine(){
        return view('Students.Routine');
    }

}