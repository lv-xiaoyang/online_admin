<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\QuestionModel;
use App\Model\CourseModel;//课程
use App\Model\CourseClassModel;//课时表
use App\Model\CourseChapterModel;//课程章
use App\Model\CourseSectionModel;//课程节
use App\Model\ExamModel;
use App\Model\ExamQuestionModel;


class ExamController extends Controller
{
    //
	public function index(){

		$data =  ExamModel::paginate(7);
		
		//获取到分数
		// $score = ExamQuestionModel::select("score")->get();
		// $zong_score = "";
		// // dd($score['score']);
		// foreach($score as $k=>$v){
		// 	// dd($v);
		// 	$boor = integer($v['score']);
		// 	$zong_score += $boor;
		// }
		// dd($zong_score);


		return view("exam.index",['data'=>$data]);
	}   
	public function add(){
		//查询题库表 单选题 多选题  简答题并给相应的分数 来作为考试选题的下拉框
		
		
		
		return view("exam.add");
	}
	public function adddo(){
		$exam_name = request()->post("exam_name");
		$start_time = request()->post("start_time");
		$end_time = request()->post("end_time");
		if(!$exam_name){
			echo json_encode(['code'=>1,'msg'=>'题干不可为空']);die;
		}
		if(!$start_time){
			echo json_encode(['code'=>1,'msg'=>'开始时间不可为空']);die;
		}
		if(!$end_time){
			echo json_encode(['code'=>1,'msg'=>'结束时间不可为空']);die;
		}
		$exam = new ExamModel();
		$exam->exam_name = $exam_name;
		$exam->start_time=$start_time;
		$exam->end_time=$end_time;
		$exam->is_del=0;
		$res = $exam->save();
		if($res){
			echo json_encode(['code'=>0,'msg'=>'添加成功']);
		}else{
			echo json_encode(['code'=>1,'msg'=>"添加失败"]);
		}

	} 
	public function danadd($exam_id){
		// echo $exam_id;
		$danwhere = [
			'question_type_id'=>1
		];
		$dan = QuestionModel::where($danwhere)->get();
		return view("exam.danadd",['dan'=>$dan,'exam_id'=>$exam_id]);
	}
	public function duoadd($exam_id){
		$duowhere = [
			'question_type_id'=>2
		];
		$duo = QuestionModel::where($duowhere)->get();
		return view("exam.duoadd",['duo'=>$duo,'exam_id'=>$exam_id]);
	}
	public function jianadd($exam_id){
		$jianwhere = [
			'question_type_id'=>3
		];
		$jian = QuestionModel::where($jianwhere)->get();
		return view("exam.jianadd",['jian'=>$jian,'exam_id'=>$exam_id]);
	}
	public function danadddo(){
		$question_id = request()->get("question_id");
		$exam_id = request()->get("exam_id");
		$ExamQuestionModel = new ExamQuestionModel();
		$ExamQuestionModel->question_id=$question_id;
		$ExamQuestionModel->exam_id=$exam_id;
		$ExamQuestionModel->eq_time = time();
		$ExamQuestionModel->score=3;
		$res = $ExamQuestionModel->save();
		if($res){
			echo json_encode(['code'=>0]);
		}else{
			echo json_encode(['code'=>1]);
		}
	}
	public function duoadddo(){
		$question_id = request()->get("question_id");
		$exam_id = request()->get("exam_id");
		$ExamQuestionModel = new ExamQuestionModel();
		$ExamQuestionModel->question_id=$question_id;
		$ExamQuestionModel->exam_id=$exam_id;
		$ExamQuestionModel->eq_time = time();
		$ExamQuestionModel->score=4;
		$res = $ExamQuestionModel->save();
		if($res){
			echo json_encode(['code'=>0]);
		}else{
			echo json_encode(['code'=>1]);
		}
	}
	public function jianadddo(){
		$question_id = request()->get("question_id");
		$exam_id = request()->get("exam_id");
		$ExamQuestionModel = new ExamQuestionModel();
		$ExamQuestionModel->question_id=$question_id;
		$ExamQuestionModel->exam_id=$exam_id;
		$ExamQuestionModel->eq_time = time();
		$ExamQuestionModel->score=5;
		$res = $ExamQuestionModel->save();
		if($res){
			echo json_encode(['code'=>0]);
		}else{
			echo json_encode(['code'=>1]);
		}
	}
	public function looks($exam_id){
		$where = [
			'exam.exam_id'=>$exam_id
		];
		$data = ExamQuestionModel::where($where)
								->leftjoin("exam","exam_question.exam_id","=","exam.exam_id")
								->leftjoin("question","exam_question.question_id","=","question.question_id")
								->paginate(5);
		return view("exam.questionindex",['data'=>$data]);

	}
	public function delete($id){
		$where = [
			'eq_id'=>$id
		];
		$res = ExamQuestionModel::where($where)->delete();
		if($res){
			return redirect("/exam/index");
		}else{
			return redirect("/exam/index");
		}
	}
	public function examdel($exam_id){
		$where = [
			'exam_id'=>$exam_id
		]; 
		$res = ExamModel::where($where)->update(['is_del'=>1]);
		if($res){
			return redirect("/exam/index");
		}else{
			return redirect("/exam/index");
		}
	}
	public function examdel2($exam_id){
		$where = [
			'exam_id'=>$exam_id
		]; 
		$res = ExamModel::where($where)->update(['is_del'=>0]);
		if($res){
			return redirect("/exam/index");
		}else{
			return redirect("/exam/index");
		}
	}
	public function exam_name(){
		$exam_name=request()->get("exam_name");
		$res = ExamModel::where("exam_name",$exam_name)->count();
		echo $res;
	}
}
