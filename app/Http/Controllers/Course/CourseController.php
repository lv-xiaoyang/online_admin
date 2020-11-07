<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * 课程添加页面
     */
    public function create(){
        return view('course.create');
    }
    /**
     * 课程列表页面
     */
    public function list(){
        return view('course.list');
    }
}
