<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//引入角色model
use App\Model\RolesModel;

class RolesController extends Controller
{
    /**
     * 角色展示方法
     */
    public function index(){
        //查询
        $data=RolesModel::get();
        //渲染视图
        return view('admin/roles/index',compact('data'));
    }

    /**
     * 角色添加方法
     */
    public function create(){
        //渲染视图
        return view('admin/roles/create');
    }

    /**
     * 角色名称验证唯一
     */
    public function unique(){
        //接值
        $ro_name=request()->except('_token');
        //查询
        $count=RolesModel::where(['ro_name'=>$ro_name])->count();
        //判断返回
        if($count==0){
            return 'ok';
        }else{
            return 'no';
        }
    }

    /**
     * 角色执行添加
     */
    public function store(){
        //接值
        $data=request()->except('_token');
        //验证
        if(empty($data['ro_name'])){
            return json_encode(['status'=>'no','field'=>'ro_name','msg'=>"<b style='color: red'>× 角色名称不可为空，请填写。</b>"]);
        }else{
            //查询
            $count=RolesModel::where(['ro_name'=>$data['ro_name']])->count();
            if($count!=0){
                return json_encode(['status'=>'no','field'=>'ro_name','msg'=>"<b style='color: red'>× 此角色名称已存在，请重新填写。</b>"]);
            }
        }
        //添加时间
        $data['ro_time']=time();
        //添加
        $bol=RolesModel::insert($data);
        //判断
        if($bol){
            return json_encode(['status'=>"ok"]);
        }else{
            return json_encode(['status'=>"no"]);
        }
    }

    /**
     * 编辑页面
     */
    public function edit($id){
        //查询单条
        $info=RolesModel::where(['ro_id'=>$id])->first();
        //渲染视图
        return view('admin/roles/edit',compact('info'));
    }

    /**
     * 修改时的角色名称验证唯一
     */
    public function unique_update($id){
        //接值
        $ro_name=request()->except('_token');
        //where 条件
        $where=[
            ['ro_name','=',$ro_name],
            ['ro_id','!=',$id]
        ];
        //查询
        $count=RolesModel::where($where)->count();
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
        if(empty($data['ro_name'])){
            return json_encode(['status'=>'no','field'=>'ro_name','msg'=>"<b style='color: red'>× 角色名称不可为空，请填写。</b>"]);
        }else{
            //where 条件
            $where=[
                ['ro_name','=',$data['ro_name']],
                ['ro_id','!=',$id]
            ];
            //查询
            $count=RolesModel::where($where)->count();
            if($count!=0){
                return json_encode(['status'=>'no','field'=>'ro_name','msg'=>"<b style='color: red'>× 此角色名称已存在，请重新填写。</b>"]);
            }
        }
        //添加时间
        $data['ro_time']=time();
        //修改
        $bol=RolesModel::where('ro_id',$id)->update($data);
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
        $bol=RolesModel::where('ro_id',$id)->delete();
        //判断
        if($bol){
            return redirect('/roles');
        }else{
            return redirect('/roles');
        }
    }
}
