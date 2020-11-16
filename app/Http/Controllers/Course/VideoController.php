<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CourseTypeModel;
use App\Model\CourseModel;
use App\Model\CourseClassModel;
use App\Model\CourseChapterModel;
use App\Model\CourseSectionModel;
use App\Model\LectModel;
use App\Model\VideoModel;

class VideoController extends Controller
{
    /**
     *视频添加 
     */
    public function create(){
        //获取课程数据
        $course_where=[
            ['course_del','=',0],
        ];
        $courese_data=CourseModel::select('course_id','course_name')->where($course_where)->get();
        return view('course.video.create',compact('courese_data'));
    }
    /**
     * 视频确认添加
     */
    public function add(){
        $data=request()->post();
        if(empty($data['course_id'])){
            return ['code'=>0002,'msg'=>'请先选择课程'];
        }
        if(empty($data['chapter_id'])){
            return ['code'=>0002,'msg'=>'请先选择章程'];
        }
        if(empty($data['section_id'])){
            return ['code'=>0002,'msg'=>'请先选择节'];
        }
        if(empty($data['class_id'])){
            return ['code'=>0002,'msg'=>'请先选择课时'];
        }
        if(empty($data['video_url'])){
            return ['code'=>0002,'msg'=>'请上传视频'];
        }
        if(empty($data['video_time'])){
            return ['code'=>0002,'msg'=>'请正确填写视频时长'];
        }
        $data['video_add_time']=time();
        $res=VideoModel::insert($data);
        if($res){
            return ['code'=>0001,'msg'=>'视频添加成功'];
        }else{
            return ['code'=>0002,'msg'=>'视频添加失败'];
        }
    }
    



}
