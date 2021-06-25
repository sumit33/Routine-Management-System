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
use App\Console\Controllers\AdminController;
use Carbon\Carbon;
session_start();

class TeacherController extends Controller
{
    function login(){
        $id = Session::get('teacher_id');
        $id1 = Session::get('admin_id');
        if($id){
            return $this->teacherDashboard();
        }
        else if($id1){
            return Redirect::to('/admin/dashboard');
        }
        return view('Teacher.login');
    }

    function loginPost(Request $request)
    {
        
        $result=DB::table('teacher')
            ->where('teacher_email',$request->teacher_email)
            ->where('teacher_password',$request->teacher_password)
            ->first();
        if($result && $result->admin==0){
            Session::put('teacher_id',$result->teacher_id);
            Session::put('teacher_name',$result->teacher_name);
            return Redirect::to('/teacher/dashboard');
        }
        else if($result && $result->admin==1)
        {
            Session::put('admin_id',$result->teacher_id);
            Session::put('admin_name',$result->teacher_name);
            return Redirect::to('/admin/dashboard');
        }
        else{
            return Redirect::to('/teacher/login');
        }
    }

    function teacherDashboard()
    {
        $this->AdminAuthCheck();
        $day = Carbon::now()->format('l');
        $teacher_id = Session::get('teacher_id');
        $classes = DB::table('course')
                    ->join('class','course.course_id','=','class.course_id')
                    ->join('teacher','course.teacher_id','=','teacher.teacher_id')
                    ->join('classroom','class.classroom_id','=','classroom.classroom_id')
                    ->where('course.teacher_id',$teacher_id)
                    ->where('class.class_day',$day)
                    ->select('class.*','course.*','classroom.classroom_name')
                    ->get();
        return view('Teacher.teacher-dashboard')->with('classes',$classes);
    }

    function allcourses($teacher_id)
    {
        $this->AdminAuthCheck();
        $courses = DB::table('course')
                ->where('teacher_id',$teacher_id)
                ->get();
        return view('Teacher.AllCourse')->with('courses',$courses);
    }
    function cancelClass($class_id)
    {
        $this->AdminAuthCheck();
        DB::table('class')
        ->where('class_id',$class_id)
        ->delete();
        DB::table('requests')
        ->where('class_id',$class_id)
        ->delete();
        return Redirect::to('/teacher/dashboard');
    }

    function changeForm($class_id)
    {
        $this->AdminAuthCheck();
        $class = DB::table('class')
                ->where('class.class_id',$class_id)
                ->select('class.*')
                ->first();
        return view('Teacher.changeForm')->with('class',$class);
    }

    function changeRequest($teacher_id)
    {
        $this->AdminAuthCheck();
        $classes = DB::table('class')
                ->join('course','class.course_id','=','course.course_id')
                ->join('classroom','class.classroom_id','=','classroom.classroom_id')
                ->join('requests','class.class_id','=','requests.class_id')
                ->join('Teacher','course.teacher_id','=','Teacher.teacher_id')
                ->select('Teacher.*','class.*','course.course_code','classroom.classroom_name','requests.*')
                ->where('course.teacher_id',$teacher_id)
                ->get();
         
        return view('Teacher.changeRequests')->with('requests',$classes);
    }

    public function logout()
    {
    	Session::flush();
    	return Redirect::to('/teacher/login');
    }

    public function AdminAuthCheck()
    {   
        $teacher_id=Session::get('teacher_id');
        if ($teacher_id) {
            return ;
        }
        else
        {
            return Redirect::to('/teacher/login')->send();
        }
    }
    public function showRoutine(){
        return view('Teacher.Routine');
    }

}
