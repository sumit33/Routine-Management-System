<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Courses;

class StudentHasCourse extends Model
{
    protected $table = "student_has_course";

    protected $fillable = [
        'student_id','course_id'
    ];

    public function courses()
    {
        
        return $this->belongsToMany(Courses::class,'student_has_course','student_id','course_id');
    }
}
