<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\QuestionModel;


class QuestionController extends Controller
{
    //题库zhanshi
    public function index(){


        return view("question.index");
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
    public function jianadddo(Request $request){
        echo "123";
    }
}
