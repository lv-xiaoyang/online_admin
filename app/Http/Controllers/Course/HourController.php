<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HourController extends Controller
{
    /**
     * 课时添加
     */
    public function create(){
        return view('course.hour.create');
    }
}
