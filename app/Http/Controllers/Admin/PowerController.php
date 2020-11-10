<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//引入权限model
use App\Model\PowerModel;

class PowerController extends Controller
{
    /**
     * 权限展示方法
     */
    public function index(){
        //查询
        $data=PowerModel::get();
        //渲染视图
        return view('admin/power/index',compact('data'));
    }

    /**
     * 权限添加方法
     */
    public function create(){
        //渲染视图
        return view('admin/power/create');
    }

    /**
     * 权限执行添加
     */
    public function store(){
        //接值
        $data=request()->except('_token');
        //验证
        if(empty($data['pow_name'])){
            return json_encode(['status'=>'no','field'=>'pow_name','msg'=>"<b style='color: red'>× 权限名称不可为空，请填写。</b>"]);
        }else{
            //查询
            $count=PowerModel::where(['pow_name'=>$data['pow_name']])->count();
            if($count!=0){
                return json_encode(['status'=>'no','field'=>'pow_name','msg'=>"<b style='color: red'>× 此权限名称已存在，请重新填写。</b>"]);
            }
        }
        if(empty($data['pow_url'])){
            return json_encode(['status'=>'no','field'=>'pow_url','msg'=>"<b style='color: red'>× 权限不可为空，请填写。</b>"]);
        }else{
            //查询
            $count=PowerModel::where(['pow_name'=>$data['pow_url']])->count();
            if($count!=0){
                return json_encode(['status'=>'no','field'=>'pow_url','msg'=>"<b style='color: red'>× 此权限已存在，请重新填写。</b>"]);
            }
        }
        //添加时间
        $data['pow_time']=time();
        //添加
        $bol=PowerModel::insert($data);
        //判断
        if($bol){
            return json_encode(['status'=>"ok"]);
        }else{
            return json_encode(['status'=>"no"]);
        }
    }

    /**
     * 权限名称验证唯一
     */
    public function unique(){
        //接值
        $pow_name=request()->except('_token');
        //查询
        $count=PowerModel::where(['pow_name'=>$pow_name])->count();
        //判断返回
        if($count==0){
            return 'ok';
        }else{
            return 'no';
        }
    }

    /**
     * 权限验证唯一
     */
    public function url_unique(){
        //接值
        $pow_url=request()->except('_token');
        //查询
        $count=PowerModel::where(['pow_url'=>$pow_url])->count();
        //判断返回
        if($count==0){
            return 'ok';
        }else{
            return 'no';
        }
    }

    /**
     * 编辑页面
     */
    public function edit($id){
        //查询单条
        $info=PowerModel::where(['pow_id'=>$id])->first();
        //渲染视图
        return view('admin/power/edit',compact('info'));
    }

    /**
     * 修改时的权限名称验证唯一
     */
    public function unique_update($id){
        //接值
        $pow_name=request()->except('_token');
        //where 条件
        $where=[
            ['pow_name','=',$pow_name],
            ['pow_id','!=',$id]
        ];
        //查询
        $count=PowerModel::where($where)->count();
        //判断返回
        if($count==0){
            return 'ok';
        }else{
            return 'no';
        }
    }

    /**
     * 修改 权限验证唯一
     */
    public function url_unique_update($id){
        //接值
        $pow_url=request()->except('_token');
        //where 条件
        $where=[
            ['pow_url','=',$pow_url],
            ['pow_id','!=',$id]
        ];
        //查询
        $count=PowerModel::where($where)->count();
        //判断返回
        if($count==0){
            return 'ok';
        }else{
            return 'no';
        }
    }

    /**
     * 修改
     */
    public function update($id){
        //接值
        $data=request()->except('_token');
        //验证
        if(empty($data['pow_name'])){
            return json_encode(['status'=>'no','field'=>'pow_name','msg'=>"<b style='color: red'>× 权限名称不可为空，请填写。</b>"]);
        }else{
            //where 条件
            $where=[
                ['pow_name','=',$data['pow_name']],
                ['pow_id','!=',$id]
            ];
            //查询
            $count=PowerModel::where($where)->count();
            if($count!=0){
                return json_encode(['status'=>'no','field'=>'pow_name','msg'=>"<b style='color: red'>× 此权限名称已存在，请重新填写。</b>"]);
            }
        }
        if(empty($data['pow_url'])){
            return json_encode(['status'=>'no','field'=>'pow_url','msg'=>"<b style='color: red'>× 权限不可为空，请填写。</b>"]);
        }else{
            //查询
            $count=PowerModel::where(['pow_name'=>$data['pow_url']])->count();
            if($count!=0){
                return json_encode(['status'=>'no','field'=>'pow_url','msg'=>"<b style='color: red'>× 此权限已存在，请重新填写。</b>"]);
            }
        }
        //添加时间
        $data['pow_time']=time();
        //修改
        $bol=PowerModel::where('pow_id',$id)->update($data);
        //判断
        if($bol!==false){
            return json_encode(['status'=>"ok"]);
        }else{
            return json_encode(['status'=>"no"]);
        }
    }

    /**
     * 权限删除
     */
    public function destroy($id){
        //删除
        $bol=PowerModel::where('pow_id',$id)->delete();
        //判断
        if($bol){
            return redirect('/power');
        }else{
            return redirect('/power');
        }
    }
}
