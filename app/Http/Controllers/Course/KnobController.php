<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KnobController extends Controller
{
    /**
     * 节添加
     */
    public function create(){
        return view('course.knob.create');
    }
}
