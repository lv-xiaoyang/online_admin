<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CourseModel;
use App\Model\CourseChapterModel;
use App\Model\CourseSectionModel;

class KnobController extends Controller
{
    /**
     * 节添加
     */
    public function create(){
        //获取课程数据
        $course_where=[
            ['course_del','=',0],
            ['course_status','=',2]
        ];
        $courese_data=CourseModel::select('course_id','course_name')->where($course_where)->get();
        // dd($courese_data);
        return view('course.knob.create',compact('courese_data'));
    }
    /**
     * 获取章程数据
     */
    public function chapter(){
        $course_id=request()->course_id;
        // dd($course_id);
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
    /**
     * 接确认添加
     */
    public function add(){
        $data=request()->post();
        if(empty($data['section_name'])){
            return ['code'=>0002,'msg'=>'节名称不能为空'];die;
        }
        if(empty($data['course_id'])){
            return ['code'=>0002,'msg'=>'请选择课程'];die;
        }
        if(empty($data['chapter_id'])){
            return ['code'=>0002,'msg'=>'请选择章程'];die;
        }
        $section_name=CourseSectionModel::where('section_name',$data['section_name'])->first();
        if(!empty($section_name)){
            return ['code'=>0002,'msg'=>'节名称已存在'];
        }
        $data['section_add_time']=time();
        $res=CourseSectionModel::insert($data);
        if($res){
            return ['code'=>0001,'msg'=>'添加成功'];
        }else{
            return ['code'=>0002,'msg'=>'添加失败'];
        }
    }
}
