<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CourseSectionModel extends Model
{
    protected $table = 'course_section';
    protected $primaryKey = 'section_id';
    public $timestamps = false;
}
