<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CourseChapterModel;
use App\Model\CourseModel;
use App\Model\CourseSectionModel;
use App\Model\CourseClassModel;

class HourController extends Controller
{
    /**
     * 课时添加
     */
    public function create(){
        //获取课程数据
        $course_where=[
            ['course_del','=',0],
        ];
        $courese_data=CourseModel::select('course_id','course_name')->where($course_where)->get();
        // dd($courese_data);
        return view('course.hour.create',compact('courese_data'));
    }
    /**
     * 课时确认添加
     */
    public function add(){
        $data=request()->post();
        if(empty($data['class_name'])){
            return ['code'=>0002,'msg'=>'课时名已存在'];die;
        }
        if(empty($data['course_id'])){
            return ['code'=>0002,'msg'=>'请选择课程'];die;
        }
        if(empty($data['chapter_id'])){
            return ['code'=>0002,'msg'=>'请选择章程'];die;
        }
        if(empty($data['section_id'])){
            return ['code'=>0002,'msg'=>'请选择节'];die;
        }
        //唯一判断
        $class_name=CourseClassModel::where('class_name',$data['class_name'])->first();
        if(!empty($class_name)){
            return ['code'=>0002,'msg'=>'课时名称已存在'];die;
        }
        $data['class_add_time']=time();
        //数据入库
        $res=CourseClassModel::insert($data);
        if($res){
            return ['code'=>0001,'msg'=>'添加成功'];
        }else{
            return ['code'=>0002,'msg'=>'添加失败'];
        }
    }
    public function chapter(){
        $course_id=request()->course_id;
        if(empty($course_id)){
            return ['code'=>0002,'msg'=>'请先选择课程'];
        }
        //获取章程数据
        $chapter_where=[
            ['chapter_del','=',0],
            ['course_id','=',$course_id]
        ];
        $chapter_data=CourseChapterModel::where($chapter_where)->get()->toArray();
        return json_encode($chapter_data);
    }
    public function section(){
        $chapter_id=request()->chapter_id;
        if(empty($chapter_id)){
            return ['code'=>0002,'msg'=>'请先选择章程'];die;
        }
        //获取章程数据
        $section_where=[
            ['section_del','=',0],
            ['chapter_id','=',$chapter_id]
        ];
        $section_data=CourseSectionModel::where($section_where)->get()->toArray();
        return json_encode($section_data);
    }
}
