<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "student";
    protected $primaryKey = 'student_id';

    protected $fillable = [
        'student_reg','student_name','sem_id'
    ];

    protected $hidden = [
        'password'
    ];
    public function courses()
    {
        return $this->belongsToMany(Courses::class,'student_has_course','student_id','course_id');
    }
}
