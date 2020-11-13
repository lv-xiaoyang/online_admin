<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ArticleModel;

class ArticleController extends Controller
{
    
    //展示
    public function index(){
        $ati_name = request()->ati_name;
        $where = [];
        if($ati_name){
            $where[] = ['ati_name','like',"%$ati_name%"];
        }

        $where2=[
            'id_del'=>0
        ];
        $data = ArticleModel::where($where)->where($where2)->paginate(2);
        return view('/article/index',['data'=>$data,'ati_name'=>$ati_name]);

    }

    // 添加
    public function create(){
        return view('/article/create');
    }

    // 执行添加

    public function story(Request $request){
        // 接值
        $ati_name = $request->post("ati_name");//资讯标题
        $ati_ishot = $request->post("ati_ishot");//资讯热度
        $ati_content = $request->post("ati_content");//资讯内容
        $ati_res = $request->post("ati_res");//资讯作者
        // dd($ati_res);
        // 判断是否为空
        if(!$ati_name){
            echo json_encode(['code'=>1,"msg"=>"标题不能为空"]);die;
        }
        if(!$ati_ishot){
            echo json_encode(['code'=>1,"msg"=>"标题不能为空"]);die;
        }
        if(!$ati_content){
            echo json_encode(['code'=>1,"msg"=>"标题不能为空"]);die;
        }
        if(!$ati_res){
            echo json_encode(['code'=>1,"msg"=>"标题不能为空"]);die;
        }
        // 实例化model
        $articleModel = new ArticleModel;
        $articleModel->ati_name=$ati_name;
        $articleModel->ati_ishot=$ati_ishot;
        $articleModel->ati_content=$ati_content;
        $articleModel->ati_res=$ati_res;
        $articleModel->ati_addtime=time();
        // 添加数据进数据库
        $res = $articleModel->save();
        if($res){
            echo json_encode(['code'=>0,"msg"=>"添加成功"]);die;
        }else{
            echo json_encode(['code'=>1,"msg"=>"添加失败"]);die;
        }

    }
    // 删除
    public function del($id){
        // echo 12345;die;
        $res = ArticleModel::where("ati_id",$id)->update(['id_del'=>1]);
        // dd($res);
        if($res){
            return redirect("/article");
        }else{
            return redirect("/article");
        }   
    }


    // 修改
    public function update($id){
        $data = ArticleModel::where('ati_id',$id)->first();
        // dd($data);
        return view("article.update",['data'=>$data]);
    }


    // 执行修改
    public function update2(Request $request,$id){
         // 接值
         $ati_name = $request->post("ati_name");//资讯标题
         $ati_ishot = $request->post("ati_ishot");//资讯热度
         $ati_content = $request->post("ati_content");//资讯内容
         $ati_res = $request->post("ati_res");//资讯作者
         $ati_id = $request->post("ati_id");
        //  dd($ati_id);
        $data = [
            'ati_name'=>$ati_name,
            'ati_ishot'=>$ati_ishot,
            'ati_content'=>$ati_content,
            'ati_res'=>$ati_res,
            'ati_id'=>$ati_id
        ];
         $res = ArticleModel::where("ati_id",$id)->update($data);
        //  dd($res);
        if($res){
            echo json_encode(['code'=>0,'msg'=>"ok"]);
        }else{
            echo json_encode(['code'=>1,'msg'=>"no"]);
        }

    }

}
