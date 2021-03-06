<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\QuestionModel;
use App\Model\CourseModel;//课程
use App\Model\CourseClassModel;//课时表
use App\Model\CourseChapterModel;//课程章
use App\Model\CourseSectionModel;//课程节

class QuestionController extends Controller
{

    //查询
    // public function search(){
    //     $question_name = request()->get("question_name");
    //     $where = [
    //         'question_name'=>$question_name
    //     ];

    // }
    //题库zhanshi
    
    public function dancount(){
        $question_name = request()->get("question_name");
        $res = QuestionModel::where("question_name",$question_name)->count();
        echo $res;
    }

    public function index(){

        // 搜索
        $question_name = request()->get('question_name');
    
        // dd($question_name);
        $wheres = [];
    
        if($question_name){
            $wheres[] = ['question_name',"like","%$question_name%"];
        }

        //查询表
        $where = [
            'is_del'=>0,
            
        ];
    
        $data = QuestionModel::leftjoin("course","question.course_id","=","course.course_id")
                            ->leftjoin("course_section","question.section_id","=","course_section.section_id")
                            ->leftjoin("course_class","question.class_id","=","course_class.class_id")
                            ->leftjoin("course_chapter","question.chapter_id","=","course_chapter.chapter_id")
                            ->where($where)
                            ->where($wheres)
                            ->orderBy("question_time","desc")
                            ->paginate(5);
        

        // dd($data);


        // $typewhere = [
            // 'question_type_id'=>2,
        // ];
        // $typedata = QuestionModel::where($typewhere)->get();
        // dd($typedata['question_cor']);
        
        // foreach ($typedata as $key => $value){
        //     $len = strlen($value->question_cor);
        //     for($i=1;$i<$len;$i++){
        //         $str = str_split($value->question_cor);
        //     }
        // }

        $question_cor  = $data;
        // dd($data);
        
        return view("question.index",['data'=>$data,'question_name'=>$question_name]);
    }
    // public function danindex(){
    // 	//单选题展示
    // 	return view("question.danindex");
    // }
    
    public function danadd(){
    	//单选题添加
    	return view("question.danadd");
    }
    
    public function danadddo(Request $request){
        //接值
        //题目类型
        $question_name = $request->post("question_name");
        $question_type_id = $request->post("question_type_id");
        // 题目难度
        $question_diff = $request->post("question_diff");
        //答案
        $question_cor = $request->post("question_cor");
        // dd($question_cor);
        //选项A内容
        $cor_a = $request->post("cor_a");
        // 选项B内容
        $cor_b = $request->post("cor_b");
         // 选项C内容
        $cor_c = $request->post("cor_c");
        // 选项D内容
        $cor_d = $request->post("cor_d");





        if(!$question_name){
            echo json_encode(['code'=>1,"msg"=>"题干不可为空"]);die;
        }
        if(!$question_type_id){
            echo json_encode(['code'=>1,"msg"=>"题目类型不可为空"]);die;
        }
        if(!$question_diff){
            echo json_encode(['code'=>1,"msg"=>"题目难度不可为空"]);die;
        }
        if(!$question_cor){
            echo json_encode(['code'=>1,"msg"=>"答案不可为空"]);die;
        }
        if(!$cor_a){
            echo json_encode(['code'=>1,"msg"=>"A内容不可为空"]);die;
        }
        if(!$cor_b){
            echo json_encode(['code'=>1,"msg"=>"B内容不可为空"]);die;
        }
        if(!$cor_c){
            echo json_encode(['code'=>1,"msg"=>"C内容不可为空"]);die;
        }
        if(!$cor_d){
            echo json_encode(['code'=>1,"msg"=>"D内容不可为空"]);die;
        }

        $questionModel = new QuestionModel();
        //
        $questionModel->question_type_id=$question_type_id;
        $questionModel->question_diff=$question_diff;
        $questionModel->question_cor=$question_cor;
        $questionModel->cor_a=$cor_a;
        $questionModel->cor_b=$cor_b;
        $questionModel->cor_c=$cor_c;
        $questionModel->cor_d=$cor_d;
        $questionModel->question_name=$question_name;
        $questionModel->question_time=time();
        $res = $questionModel->save();
        if($res){
            echo json_encode(['code'=>0,"msg"=>"添加成功"]);die;
        }else{
            echo json_encode(['code'=>1,"msg"=>"添加失败"]);die;
        }
    }
    
    // public function duoindex(){
    	// // 多选题展示
        // return view("question.duoindex");
    
    // }
    
    public function duoadd(){
        // 多选题添加
        return view("question.duoadd");
    }
    public function duoadddo(Request $request){
        //接值
        //题目类型
        $question_name = $request->post("question_name");
        $question_type_id = $request->post("question_type_id");
        // 题目难度
        $question_diff = $request->post("question_diff");
        //答案
        $question_cor = $request->post("question_cor");
        $question_cor = implode(",",$question_cor);
        // dd($question_cor);
        //选项A内容
        $cor_a = $request->post("cor_a");
        // 选项B内容
        $cor_b = $request->post("cor_b");
         // 选项C内容
        $cor_c = $request->post("cor_c");
        // 选项D内容
        $cor_d = $request->post("cor_d");
        
        if(!$question_type_id){
            echo json_encode(['code'=>1,"msg"=>"题目类型不可为空"]);die;
        }
        if(!$question_diff){
            echo json_encode(['code'=>1,"msg"=>"题目难度不可为空"]);die;
        }
        if(!$question_cor){
            echo json_encode(['code'=>1,"msg"=>"答案不可为空"]);die;
        }
        if(!$cor_a){
            echo json_encode(['code'=>1,"msg"=>"A内容不可为空"]);die;
        }
        if(!$cor_b){
            echo json_encode(['code'=>1,"msg"=>"B内容不可为空"]);die;
        }
        if(!$cor_c){
            echo json_encode(['code'=>1,"msg"=>"C内容不可为空"]);die;
        }
        if(!$cor_d){
            echo json_encode(['code'=>1,"msg"=>"D内容不可为空"]);die;
        }
        $questionModel = new QuestionModel();
        //
        $questionModel->question_type_id=$question_type_id;
        $questionModel->question_diff=$question_diff;
        $questionModel->question_cor=$question_cor;
        $questionModel->cor_a=$cor_a;
        $questionModel->cor_b=$cor_b;
        $questionModel->cor_c=$cor_c;
        $questionModel->cor_d=$cor_d;
        $questionModel->question_name=$question_name;
        $questionModel->question_time=time();
        $res = $questionModel->save();
        if($res){
            echo json_encode(['code'=>0,"msg"=>"添加成功"]);die;
        }else{
            echo json_encode(['code'=>1,"msg"=>"添加失败"]);die;
        }

    }
    // public function jianindex(){
    	// // 简答题展示
    	// return view("question.jianindex");
    // }
    public function jianadd(){
    	return view("question.jianadd");
    }
    public function jianaddo(Request $request){
        // 接值
        //接值
        //题目类型
        $question_name = $request->post("question_name");
        $question_type_id = $request->post("question_type_id");
        // 题目难度
        $question_diff = $request->post("question_diff");
        //答案
        $cor_a = $request->post("cor_a");
            if(!$question_name){
                echo json_encode(['code'=>1,"msg"=>"题目题干不可为空"]);die;
            }
           if(!$question_type_id){
                echo json_encode(['code'=>1,"msg"=>"题目类型不可为空"]);die;
            }
            if(!$question_diff){
                echo json_encode(['code'=>1,"msg"=>"题目难度不可为空"]);die;
            }
            
            if(!$cor_a){
                echo json_encode(['code'=>1,"msg"=>"A内容不可为空"]);die;
            }
        $questionModel = new QuestionModel();
        //
        $questionModel->question_type_id=$question_type_id;
        $questionModel->question_diff=$question_diff;
        $questionModel->cor_a=$cor_a;
        $questionModel->question_name=$question_name;
        $questionModel->question_time=time();
        $res = $questionModel->save();
        if($res){
            echo json_encode(['code'=>0,"msg"=>"添加成功"]);die;
        }else{
            echo json_encode(['code'=>1,"msg"=>"添加失败"]);die;
        }
        
    }
    //删除
    public function del($id){
        $res = QuestionModel::where("question_id",$id)->update(['is_del'=>1]);
        if($res){
            return redirect("/question/index");
        }else{
            return redirect("/question/index");
        }   
    }
    // 修改
    public function upd($id){
        //根据id获取数据
        $data = QuestionModel::where("question_id",$id)->first();
        $question_type_id = $data->question_type_id;
        if($question_type_id==1){
            return view("question.danupdate",['data'=>$data]);
        }else if($question_type_id==2){
            $question_cor = $data['question_cor'];

            $question_cor = str_split($question_cor);
            foreach ($question_cor as $key => $value) {
                if($value==','){
                    unset($question_cor[$key]);
                }
            }
            // $question_cor = implode("",$question_cor);
            $a = $question_cor[0];
            $b = $question_cor[2];

            // foreach ($question_cor as $key => $value) {
                // $a .=$value;
                // $b=$value[1];

            // }
            // dd($a);

            // dd($question_cor);

            return view("question.duoupdate",['data'=>$data,'question_cor'=>$question_cor,'a'=>$a,'b'=>$b]);
        }else if($question_type_id==3){
            return view("question.jianupd",['data'=>$data]);
        }

    }
    //执行修改
    public function update(Request $request){
        $question_id = $request->post("question_id");

        //题目类型
        $question_name = $request->post("question_name");
        $question_type_id = $request->post("question_type_id");
        // 题目难度
        $question_diff = $request->post("question_diff");
        //答案
        $cor_a = $request->post("cor_a");
        $where = [
            'question_id'=>$question_id,
        ];
        $data = [
            'question_name'=>$question_name,
            'question_type_id'=>$question_type_id,
            'question_time'=>time(),
            'question_diff'=>$question_diff,
            'cor_a'=>$cor_a,
        ];
        $res = QuestionModel::where($where)->update($data);
        if($res!==false){
            echo json_encode(['code'=>0,"msg"=>"修改成功"]);
        }else{
            echo json_encode(['code'=>1,'msg'=>"修改失败"]);
        }

    }
    public function danupdate(Request $request,$id){
         //接值
        // echo $id;
        //题目类型
        $question_name = $request->post("question_name");
        $question_type_id = $request->post("question_type_id");
        // 题目难度
        $question_diff = $request->post("question_diff");
        //答案
        $question_cor = $request->post("question_cor");
        // dd($question_cor);
        //选项A内容
        $cor_a = $request->post("cor_a");
        // 选项B内容
        $cor_b = $request->post("cor_b");
         // 选项C内容
        $cor_c = $request->post("cor_c");
        // 选项D内容
        $cor_d = $request->post("cor_d");
    
        $where = [
            'question_id'=>$id,
        ];
        $data = [
            'question_name'=>$question_name,
            'question_type_id'=>$question_type_id,
            'question_time'=>time(),
            'question_diff'=>$question_diff,
            'question_cor'=>$question_cor,
            'cor_a'=>$cor_a,
            'cor_d'=>$cor_d,
            'cor_c'=>$cor_c,
            'cor_b'=>$cor_b
        ];
        $res = QuestionModel::where($where)->update($data);
        if($res!==false){
            echo json_encode(['code'=>0,"msg"=>"修改成功"]);
        }else{
            echo json_encode(['code'=>1,'msg'=>"修改失败"]);
        }

    }
    // 恢复删除页面
    public function huifuindex(){
        $where = [
        'is_del'=>1
        ];
        $data = QuestionModel::where($where)->get();
        return view("question.huifudel",['data'=>$data]);
    }
    //执行恢复
    public function huifudel($id){
        $where = [
            'is_del'=>0,
        ];
        $wheres = [
            'question_id'=>$id
        ];
        $res = QuestionModel::where($wheres)->update($where);
        if($res){
            return redirect("/question/index");
        }else{
            return redirect("/question/index");
        }
    }

    public function course($id){
        //课程
        $course = CourseModel::select('course_id',"course_name")->get();
        // 章
        $course_chapter = CourseChapterModel::select("chapter_id","chapter_name")->get();
        // 节
        $course_section = CourseSectionModel::select("section_id","section_name")->get();
        // 课时
        $course_class = CourseClassModel::select("class_id","class_name")->get();
        
        return view("question.course",['question_id'=>$id,'course'=>$course,'chapter'=>$course_chapter,'section'=>$course_section,'class'=>$course_class]);
    }
    public function courses(){
        $course_id = request()->get("course_id");
        // 根据课程id查询课程章
        $where = [
            'course_id'=>$course_id
        ]; 
        $course_chapter = CourseChapterModel::where($where)->get();
        // echo json_encode(['data'=>$course_chapter]);
        return response()->json($course_chapter);
    }
    public function sectionn(){
        $chapter_id = request()->get("chapter_id");
        $where = [
            'chapter_id'=>$chapter_id
        ];
        $section = CourseSectionModel::where($where)->get();
        return response()->json($section);
    }
    public function coursec(){
        $section_id = request()->get("section_id");
        $where = [
            'section_id'=>$section_id
        ];
        $class = CourseClassModel::where($where)->get();
        return response()->json($class);
    }
    public function coursecreate(Request $request){
        $course_id = $request->get("course_id");
        $chapter_id = $request->get("chapter_id");
        $section_id = $request->get("section_id");
        $class_id = $request->get("class_id");
        $question_id = $request->get("question_id");
        $question = new QuestionModel();
        $data = [
            'course_id'=>$course_id,
            'chapter_id'=>$chapter_id,
            'section_id'=>$section_id,
            'class_id'=>$class_id
        ];
        $where = [
            'question_id'=>$question_id
        ];
        $res = QuestionModel::where($where)->update($data);
        if($res){
            echo json_encode(['code'=>0,'msg'=>"ok"]);
        }else{
            echo json_encode(['code'=>1,'msg'=>"no"]);
        }
    }
    public function duoupdate(Request $request){
        $question_id = $request->post("question_id");
        $question_name = $request->post("question_name");
        $question_type_id = $request->post("question_type_id");
        // 题目难度
        $question_diff = $request->post("question_diff");
        //答案
        $question_cor = $request->post("question_cor");
        $question_cor = implode(",",$question_cor);
        // dd($question_cor);
        //选项A内容
        $cor_a = $request->post("cor_a");
        // 选项B内容
        $cor_b = $request->post("cor_b");
         // 选项C内容
        $cor_c = $request->post("cor_c");
        // 选项D内容
        $cor_d = $request->post("cor_d");

        $where = [
            'question_id'=>$question_id
        ];
        $data = [
            'question_name'=>$question_name,
            'question_type_id'=>$question_type_id,
            'question_diff'=>$question_diff,
            'question_cor'=>$question_cor,
            'cor_a'=>$cor_a,
            'cor_b'=>$cor_b,
            'cor_c'=>$cor_c,
            'cor_d'=>$cor_d
        ];

        $res = QuestionModel::where($where)->update($data);

        if($res!==false){
            echo json_encode(['code'=>0,"msg"=>"修改成功"]);

        }else{

            echo json_encode(['code'=>1,'msg'=>"修改失败"]);
        }

    }

}