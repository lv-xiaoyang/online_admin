<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CourseChapterModel extends Model
{
    protected $table = 'course_chapter';
    protected $primaryKey = 'chapter_id';
    public $timestamps = false;
}
