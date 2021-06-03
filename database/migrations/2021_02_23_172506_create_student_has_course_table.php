<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentHasCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_has_course', function (Blueprint $table) {
            $table->increments('student_has_course_id');
            $table->unsignedInteger('student_id')->references('id')->on('student');
            $table->unsignedInteger('course_id')->references('id')->on('course');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_has_course');
    }
}
