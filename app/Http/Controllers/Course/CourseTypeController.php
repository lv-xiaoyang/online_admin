<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CourseTypeModel;

class CourseTypeController extends Controller
{
    /**
     * 课程分类的添加
     * 
     */
    public function create(){
        return view('course.type.create');
    }
    public function add(){
        $data['type_name']=request()->chapter_name;
        //唯一处理
        $type_data=CourseTypeModel::where('type_name',$data['type_name'])->first();
        if(!empty($type_data)){
            return ['code'=>0003,'msg'=>'分类已经存在'];
        }
        $data['type_add_time']=time();
        $res=CourseTypeModel::insert($data);
        if($res){
            return ['code'=>0001,'msg'=>'添加成功'];
        }else{
            return ['code'=>0002,'msg'=>'添加失败'];
        }
    }
}
