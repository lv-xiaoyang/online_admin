<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CourseTypeModel;
use App\Model\CourseModel;

class CourseController extends Controller
{
    /**
     * 课程添加页面
     */
    public function create(){
        //查询课程分类信息
        $type_data=CourseTypeModel::select('type_id','type_name')->get();
        //查询讲师信息

        return view('course.create',compact('type_data'));
    }
    /**
     * 课程确认添加
     */
    public function add(){
        $data=request()->except('_token');
        //唯一验证
        $name_data=CourseModel::where('course_name',$data['course_name'])->first();
        if(!empty($name_data)){
            return ['code'=>0003,'msg'=>'课程名称已存在'];
        }
        $file = request()->file('course_img');
        $fileImg=$this->fileImg($file);
        $data['course_add_time']=time();
        $data['course_img']=$fileImg;
        // dd($data);
        $res=CourseModel::insert($data);
        if($res){
            return ['code'=>0001,'msg'=>'添加成功'];
        }else{
            return ['code'=>0002,'msg'=>'添加失败'];
        }
    }
    /**
     * 课程列表页面
     */
    public function list(){
        
        return view('course.list');
    }
    //图片上传处理
    public function fileImg($file){
        if ($file->isValid()){
            $path = $file->store('images');
        }
        return $path;
    }




}
