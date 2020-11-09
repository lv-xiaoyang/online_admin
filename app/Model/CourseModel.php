<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CourseModel extends Model
{
    protected $table = 'course';
    protected $primaryKey = 'course_id';
    public $timestamps = false;
}
