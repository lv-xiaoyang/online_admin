<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\TeacherModel;
class TeacherController extends Controller
{
    //
    public function index(){
        $where = [
            'is_del'=>0
        ];
        $data = TeacherModel::where($where)->get();
        return view("teacher.index",['data'=>$data]);
    }
    public function del($id){
        $res = TeacherModel::where("lereg_id",$id)->update(['is_del'=>1]);
        if($res){
            return redirect("/teacher");
        }else{
            return redirect("/teacher");
        }
    }
    public function upd($id){
        $data = TeacherModel::where('lereg_id',$id)->first();
        return view("teacher.upd",['data'=>$data]);
    }
    public function update($id){
        $lereg_name = request()->post('lereg_name');
        // var_dump($lereg_name);
        $lereg_res = request()->lereg_res;
        
        $lereg_edu = request()->lereg_edu;
        $lereg_school = Request()->lereg_school;
        $lereg_magor = request()->lereg_magor;
        $lereg_time = request()->lereg_time;
        

        $data = [
            'lereg_name'=>$lereg_name,
            'lereg_res'=>$lereg_res,
            'lereg_edu'=>$lereg_edu,
            'lereg_school'=>$lereg_school,
            'lereg_magor'=>$lereg_magor,
            // 'lereg_qual'=>$lereg_qual,
            'lereg_time'=>$lereg_time,
        ];
        $res = TeacherModel::where("lereg_id",$id)->update($data);
        if($res!==false){
            return redirect("/teacher");
        }else{
            return redirect("/teacher");
        }
    }
}
