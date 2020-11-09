<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    //题库zhanshi
    public function index(){
        return view("question.index");
    }
    public function danindex(){
    	//单选题展示
    	return view("question.danindex");
    }
    public function danadd(){
    	//单选题添加
    	return view("question.danadd");
    }

    public function duoindex(){
    	// 多选题展示
        return view("question.duoindex");
    }
    public function duoadd(){
        // 多选题添加
        return view("question.duoadd");
    }
    public function jianindex(){
    	// 简答题展示
    	return view("question.jianindex");
    }
    public function jianadd(){
    	return view("question.jianadd");
    }
}
