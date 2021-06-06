<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/student/dashboard', function () {
//     return view('Students.dashboard');
// });
Route::post('/addCourseInStudentDashboard','StudentController@addCourseInStudentDashboard');
Route::get('/student/login','StudentController@login');
Route::post('/student/student-login','StudentController@loginPost');

Route::get('/student/student-logout','StudentController@logout');
Route::get('/student/courses/{student_id}','StudentController@allcourses');
Route::get('/student/add_new_course/{student_id}','StudentController@AddNewCourse');

Route::get('/student/add_new_course/GetCourseID/{sem_id}','StudentController@GetCourseId');

Route::get('/student/dashboard','StudentController@studentDashboard');
Route::get('/student/delete-course/{course_id}','StudentController@deleteCourse');
Route::get('/student/Routine','StudentController@showRoutine');
Route::get('/student/logout','StudentController@logout');


///CR

Route::get('/change-form/{class_id}','StudentController@changeForm');
Route::post('/save-request/{class_id}','StudentController@saveRequest');
Route::get('/changeRequest/{student_id}','StudentController@changeRequest');


//teacher
Route::get('/teacher/login','TeacherController@login');
Route::post('/teacher/teacher-login','TeacherController@loginPost');

Route::get('/teacher/dashboard','TeacherController@teacherDashboard');
Route::get('/teacher/courses/{teacher_id}','TeacherController@allcourses');
Route::get('/cancelClass/{class_id}','TeacherController@cancelClass');
Route::get('/teacher/change-form/{class_id}','TeacherController@changeForm');
Route::get('/teacher/changeRequest/{teacher_id}','TeacherController@changeRequest');
Route::get('/teacher/logout','TeacherController@logout');

//Admin
Route::get('/admin/admin-login','AdminController@loginPost');
Route::get('/admin/dashboard','AdminController@AdminDashboard');
Route::get('/admin/changeRequests','AdminController@changeRequests');
Route::get('/admin/allcourse','AdminController@allCourse');
Route::get('/admin/addCourse','AdminController@addCourse');
Route::post('/admin/save-course','AdminController@saveCourse');
Route::get('/admin/allteachers','AdminController@allTeachers');
Route::get('/admin/allclassroom','AdminController@allClassroom');
Route::get('/admin/addclassroom','AdminController@addClassroom');
Route::post('/admin/save-classroom','AdminController@saveClassroom');
Route::get('/admin/logout','TeacherController@logout');
Route::get('/assignTeacher/{course_id}','AdminController@assign');
Route::post('/saveAssignTeacher/{course_id}','AdminController@saveAssignTeacher');
Route::get('/admin/accept_req/{request_id}','AdminController@acceptRequest');
Route::get('/admin/reject_req/{request_id}','AdminController@rejectRequest');



