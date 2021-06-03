<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $table = "course";


    public function students()
    {
        return $this->belongsToMany(Student::class,'student_has_course','student_id','course_id');
    }
}
