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


class CourseController extends Controller
{
    /**
     * 课程添加页面
     */
    public function create(){
        //查询课程分类信息
        $type_data=CourseTypeModel::select('type_id','type_name')->get();
        //查询讲师信息
        $lect_data=LectModel::select('lect_id','lect_name')->get();
        return view('course.create',compact('type_data','lect_data'));
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
        // $array=[];
        // foreach($course_data as $v){
        //     $v->pid=0;
        //     //查询章程
        //     $chapter_data=CourseChapterModel::where('course_id',$v->course_id)->get();
        //     $chapter_data['pid']=$v->course_id;

        // }
        // dd($array);
        return view('course.list',compact('course_data'));
    }
    //图片上传处理
    public function fileImg($file){
        if ($file->isValid()){
            $path = $file->store('images');
        }
        return $path;
    }
    /**
     * 获取章程数据
     */
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
     /**
      * 获取节数据
      */
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
        // dd($section_data);
        return json_encode($section_data);
    }
      /**
       * 获取课时数据
       */
    public function courseclass(){
        $section_id=request()->section_id;
        if(empty($section_id)){
            return ['code'=>0002,'msg'=>'请先选择节'];die;
        }
        //获取章程数据
        $class_where=[
            ['class_del','=',0],
            ['section_id','=',$section_id]
        ];
        $class_data=CourseClassModel::where($class_where)->get()->toArray();
        // dd($class_data);
        return json_encode($class_data);
    }
    public function del(){
        $course_id=request()->course_id;
        //判断删除的课程下是否有章程
        $chapter_data=CourseChapterModel::where('course_id',$course_id)->first();
        // dd($chapter_data);
        if(!empty($chapter_data)){
            return ['code'=>0002,'msg'=>'本课程下有章程，不可以删除'];die;
        }
        //逻辑删
        $res=CourseModel::where('course_id',$course_id)->update(['course_del'=>1]);
        if($res){
            return ['code'=>0001,'msg'=>'删除成功'];
        }else{
            return ['code'=>0002,'msg'=>'删除失败'];
        }
    }

    public function addimg(){
        $arr = $_FILES["Filedata"];
    	$tmpName = $arr['tmp_name'];
    	$ext  = explode(".",$arr['name'])[1];
    	$newFileName = md5(time()).".".$ext;
    	$newFilePath = "./uploads/".$newFileName;
    	move_uploaded_file($tmpName, $newFilePath);
    	$newFilePath = trim($newFilePath,".");
    	echo $newFilePath;
    }



}
