<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CourseTypeModel extends Model
{
    protected $table = 'course_type';
    protected $primaryKey = 'type_id';
    public $timestamps = false;
}
