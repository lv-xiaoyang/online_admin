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
            return ['code'=>0003,'msg'=>'课程名称已存在'];die;
        }
        $file = request()->file('course_img');
        //文件上传验证
        if(empty($file)){
            return ['code'=>0002,'msg'=>'请上传文件'];die;
        }
        $fileImg=$this->fileImg($file);
        $data['course_add_time']=time();
        $data['course_img']=$fileImg;
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
        $course_where=[
            ['course_del','=',0]
        ];
        $course_data=CourseModel::leftjoin('course_type','course.course_type','=','course_type.type_id')->leftjoin('lect','course.lect_id','=','lect.lect_id')->where($course_where)->get();
        return view('course.list',compact('course_data'));
    }
    //图片上传处理
    public function fileImg($file){
        if ($file->isValid()){
            $path = $file->store('images');
        }
        return $path;
    }




}
