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

class AdminController extends Controller
{
    function loginPost(Request $request)
    {
        
        $result=DB::table('admin')
            ->where('admin_email',$request->teacher_email)
            ->where('admin_password',$request->teacher_password)
            ->get();
        if($result){
            Session::put('admin_id',$result->admin_id);
            Session::put('admin_name',$result->admin_name);
            return Redirect::to('/admin/dashboard');
            //return $result;
        }
        else{
            return Redirect::to('/teacher/login');
            //return $result;
        }
    }

    public function AdminDashboard()
    {
        $this->AdminAuthCheck();
        return view('Admin.AdminDashboard');
    }

    public function changeRequests()
    {
        $this->AdminAuthCheck();
        $classes = DB::table('class')
                ->join('course','class.course_id','=','course.course_id')
                ->join('classroom','class.classroom_id','=','classroom.classroom_id')
                ->join('requests','class.class_id','=','requests.class_id')
                ->select('class.*','course.course_code','classroom.classroom_name','requests.*')
                ->where('requests.active_id',0)
                ->get();
        return view('Admin.ChangeRequests')->with('classes',$classes);
    }

    function allCourse()
    {
        $this->AdminAuthCheck();
        return view('Admin.allCourse');
    }
    function addCourse()
    {
        $this->AdminAuthCheck();
        return view('Admin.addNewCourse');
    }

    function saveCourse(Request $request)
    {
        $this->AdminAuthCheck();
        $data = array();
        $data['course_title'] = $request->title;
        $data['course_code'] = $request->course_code;
        $data['sem_id'] = $request->semester;
        $data['credit'] = $request->credit;
        $data['course_type'] = $request->type;
        DB::table('course')->insert($data);
        return Redirect::to('/admin/allcourse');
    }

    function allTeachers()
    {
        $this->AdminAuthCheck();
        return view('Admin.AllTeachers');
    }
    
    function allClassroom()
    {
        $this->AdminAuthCheck();
        return view('Admin.AllClassroom');
    }
    function addClassroom()
    {
        $this->AdminAuthCheck();
        return view('Admin.AddClassroom');
    }
    function saveClassroom(Request $request)
    {
        $this->AdminAuthCheck();
        $data = array();
        $data['classroom_name'] = $request->classroom_name;
        $data['capacity'] = $request->capacity;
        $data['classroom_type'] = $request->classroom_type;
        DB::table('classroom')->insert($data);
        return Redirect::to('/admin/allclassroom');
    }

    function assign($course_id)
    {
        $this->AdminAuthCheck();
        $course = DB::table('course')
                    ->where('course_id',$course_id)
                    ->first();
        return view('Admin.AssignTeacher')->with('course',$course);
    }

    function saveAssignTeacher(Request $request,$course_id)
    {
        $this->AdminAuthCheck();
        $data = array();
        $data['teacher_id'] = $request->teacher_id;
        DB::table('course')
        ->where('course_id',$course_id)
        ->update($data);
        return Redirect::to('/admin/allcourse');
    }

    function acceptRequest($request_id)
    {
        $this->AdminAuthCheck();

        $class = DB::table('class')
                ->join('classroom','class.classroom_id','=','classroom.classroom_id')
                ->join('requests','class.class_id','=','requests.class_id')   
                ->where('requests.request_id',$request_id)
                ->select('class.*','classroom.*','requests.*')
                ->first();


        $data = array();
        if( $class->class_time != $class->req_class_time){
            $data['active_id'] = 1;
        }else{
            $data['active_id'] = 2;
        }
        
        DB::table('requests')
            ->where('request_id',$request_id)
            ->update($data);
        $req_details = DB::table('requests')
                        ->where('request_id',$request_id)
                        ->first();
        $data = array();
        $data['class_time'] = $req_details->req_class_time;
        $data['classroom_id'] = $req_details->req_classroom_id;
        DB::table('class')
            ->where('class_id',$req_details->class_id)
            ->update($data);

        return Redirect::to('/admin/changeRequests');
    }

    function rejectRequest($request_id)
    {
        $this->AdminAuthCheck();
        $class = DB::table('class')
                ->join('classroom','class.classroom_id','=','classroom.classroom_id')
                ->join('requests','class.class_id','=','requests.class_id')   
                ->where('requests.request_id',$request_id)
                ->select('class.*','classroom.*','requests.*')
                ->first();


        $data = array();
        if( $class->class_time != $class->req_class_time){
            $data['active_id'] = -1;
        }else{
            $data['active_id'] = -2;
        }
        DB::table('requests')
            ->where('request_id',$request_id)
            ->update($data);
        return Redirect::to('/admin/changeRequests');
    }

    function createClass()
    {
        return view('createClass');
    }
    function saveClass(Request $request)
    {
        $data = array();
        $data['course_id']=$request->course_id;
        $data['classroom_id']=$request->classroom_id;
        $data['class_day']=$request->class_day;
        $data['class_time']=$request->class_time;
        $data['class_duration']=$request->class_duration;
        DB::table('class')->insert($data);
        return Redirect::to('/createClass');
    }
    function activeRoutine()
    {
        $this->AdminAuthCheck();
        return view('Admin.ActiveRoutine');
    }
    function SeeRoutine($sem_id)
    {
        $this->AdminAuthCheck();
        return view('Admin.AdminRoutine')->with('sem_id',$sem_id);
    }
    public function AdminAuthCheck()
    {
        
        $admin_id=Session::get('admin_id');
        if ($admin_id) {
            return ;
        }
        else
        {
            return Redirect::to('/teacher/login')->send();
        }
    }
}
