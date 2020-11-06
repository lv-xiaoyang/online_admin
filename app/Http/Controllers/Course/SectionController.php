<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * 章程添加
     */
    public function create(){
        return view('course.section.create');
    }
}
