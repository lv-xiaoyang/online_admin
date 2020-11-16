<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CourseModel;
use App\Model\CourseTypeModel;
use App\Model\CourseChapterModel;
use App\Model\CourseSectionModel;

class SectionController extends Controller
{
    /**
     * 章程添加
     */
    public function create(){
        //获取所有课程
        $course_where=[
            ['course_del','=',0]
        ];
        $course_data=CourseModel::select('course_id','course_name')->where($course_where)->get();
        return view('course.section.create',compact('course_data'));
    }
    /**
     * 章程确认添加
     */
    public function add(){
        $data=request()->post();
        if(empty($data['chapter_name'])){
            return ['code'=>0002,'msg'=>'章程名称不能为空'];die;
        }
        if(empty($data['course_id'])){
            return ['code'=>0002,'msg'=>'请选择所属课程'];die;
        }
        $chapter_data=CourseChapterModel::where('chapter_name',$data['chapter_name'])->first();
        if(!empty($chapter_data)){
            return ['code'=>0002,'msg'=>'章程名称已存在'];
        }
        $data['chapter_add_time']=time();
        $res=CourseChapterModel::insert($data);
        if($res){
            return ['code'=>0001,'msg'=>'添加成功'];
        }else{
            return ['code'=>0002,'msg'=>'添加失败'];
        }
    }
}
