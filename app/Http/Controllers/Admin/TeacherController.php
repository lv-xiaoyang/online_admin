<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\TeacherModel;
class TeacherController extends Controller
{
    //讲师展示
    public function index(){
         // 接搜索值
        $lereg_name = request()->lereg_name;
        $where = [];
        if($lereg_name){
            $where[] = ['lereg_name','like',"%$lereg_name%"];
        }
        // print_r($lereg_name);
        // $where = [
        //     'is_del'=>0,
            
        // ];
        $data = TeacherModel::where($where)->orderBy("lereg_id","desc")->paginate(3);
        // dd($data);
        $where2 = [
            'lereg_is'=>0,
        ];
        $typedata = TeacherModel::where($where2)->get();
        // dd($typedata);
        return view("teacher.index",['data'=>$data]);
    }
    

    
    //删除 
    public function del($id){
        $res = TeacherModel::where("lereg_id",$id)->update(['is_del'=>1]);
        if($res){
            return redirect("/teacher");
        }else{
            return redirect("/teacher");
        }
    }

    // 修改
    public function upd($id){
        $data = TeacherModel::where('lereg_id',$id)->first();
        return view("teacher.upd",['data'=>$data]);
    }

    // 执行修改
    public function update($id){
        // 接收ajax传来的值
        $lereg_name = request()->post('lereg_name');
        // var_dump($lereg_name);
        $lereg_res = request()->lereg_res;
        
        $lereg_edu = request()->lereg_edu;
        $lereg_school = Request()->lereg_school;
        $lereg_magor = request()->lereg_magor;
        $lereg_time = request()->lereg_time;
        // 转化为数组
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
