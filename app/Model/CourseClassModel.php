<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CourseClassModel extends Model
{
    protected $table = 'course_class';
    protected $primaryKey = 'class_id';
    public $timestamps = false;
}
