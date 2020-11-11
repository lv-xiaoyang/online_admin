<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//引入角色model
use App\Model\RolesModel;
//引入权限model
use App\Model\PowerModel;
//引入角色权限表
use App\Model\RolesPowerModel as RP;

class RolePowerController extends Controller
{
    /**
     * 角色权限展示方法
     */
    public function index(){
        //查询
        $data=RP::select('online_role_power.*','ro_name')
                ->leftjoin('online_role','online_role_power.ro_id','=','online_role.ro_id')
                ->where(['rp_del'=>0])
                ->get();
        //循环获取权限
        foreach($data as $k=>$v){
            $pow_id=explode(',',$v['pow_id']);
            foreach($pow_id as $k1=>$v1){
                $v['pow_name'].=PowerModel::where(['pow_id'=>$v1])->value('pow_name').',';
            }
            //去除多余字符
            $v['pow_name']=rtrim($v['pow_name'],',');
        }
        //渲染视图
        return view('admin/role_power/index',compact('data'));
    }

    /**
     * 角色权限添加方法
     */
    public function create(){
        //查询角色
        $roles_data=RolesModel::select('ro_id','ro_name')->get();
        //查询权限
        $power_data=PowerModel::select('pow_id','pow_name')->get();
        //渲染视图
        return view('admin/role_power/create',compact('roles_data','power_data'));
    }

    /**
     * 验证角色 唯一
     */
    public function unique(){
        //接值
        $ro_id=request()->except('_token');
        //查询
        $roles=RP::where(['ro_id'=>$ro_id,'rp_del'=>0])->count();
        //判断
        if($roles==0){
            //返回
            return json_encode(['status'=>'ok']);
        }else{
            //返回
            return json_encode(['status'=>'no']);
        }
    }

    /**
     * 执行添加
     */
    public function store(){
        //接值
        $data=request()->except('_token');
        //判断
        if(empty($data['ro_id'])){
            //返回
            return json_encode(['status'=>'fail','field'=>'roles','msg'=>'<b style="color: red">× 请选择角色。</b>']);
        }else{
            //where 条件
            $where=[
                ['ro_id','=',$data['ro_id']],
                ['rp_del','=',0]
            ];
            //查询
            $roles=RP::where($where)->count();
            //判断
            if($roles!=0){
                //返回
                return json_encode(['status'=>'fail','field'=>'roles','msg'=>'<b style="color: red">× 该角色已存在，请重新选择。</b>']);
            }
        }
        if(empty($data['pow_id'])){
            //返回
            return json_encode(['status'=>'fail','field'=>'power','msg'=>'<b style="color: red">× 请选择权限。</b>']);
        }
        //添加时间
        $data['rp_time']=time();
        //添加
        $bol=RP::insert($data);
        //判断
        if($bol){
            //成功返回
            return json_encode(['status'=>'ok']);
        }else{
            //失败返回
            return json_encode(['status'=>'no']);
        }
    }

    /**
     * 编辑页面
     */
    public function edit($id){
        //查询角色
        $roles_data=RolesModel::select('ro_id','ro_name')->get();
        //查询权限
        $power_data=PowerModel::select('pow_id','pow_name')->get();
        //查询
        $info=RP::where(['rp_id'=>$id,'rp_del'=>0])->first();
        //处理权限
        $info->pow_id=explode(',',$info->pow_id);
        //渲染视图
        return view('admin/role_power/edit',compact('roles_data','power_data','info'));
    }

    /**
     * 修改 验证角色唯一
     */
    public function unique_update($id){
        //接值
        $ro_id=request()->except('_token');
        //where 条件
        $where=[
            ['ro_id','=',$ro_id],
            ['rp_id','!=',$id],
            ['rp_del','=',0]
        ];
        //查询
        $roles=RP::where($where)->count();
        //判断
        if($roles==0){
            //返回
            return json_encode(['status'=>'ok']);
        }else{
            //返回
            return json_encode(['status'=>'no']);
        }
    }

    /**
     * 修改
     */
    public function update($id){
        //接值
        $data=request()->except('_token');
        //判断
        if(empty($data['ro_id'])){
            //返回
            return json_encode(['status'=>'fail','field'=>'roles','msg'=>'<b style="color: red">× 请选择角色。</b>']);
        }else{
            //where 条件
            $where=[
                ['ro_id','=',$data['ro_id']],
                ['rp_id','!=',$id],
                ['rp_del','=',0]
            ];
            //查询
            $roles=RP::where($where)->count();
            //判断
            if($roles!=0){
                //返回
                return json_encode(['status'=>'fail','field'=>'roles','msg'=>'<b style="color: red">× 该角色已存在，请重新选择。</b>']);
            }
        }
        if(empty($data['pow_id'])){
            //返回
            return json_encode(['status'=>'fail','field'=>'power','msg'=>'<b style="color: red">× 请选择权限。</b>']);
        }
        //添加时间
        $data['rp_time']=time();
        //添加
        $bol=RP::where(['rp_id'=>$id,'rp_del'=>0])->update($data);
        //判断
        if($bol!==false){
            //成功返回
            return json_encode(['status'=>'ok']);
        }else{
            //失败返回
            return json_encode(['status'=>'no']);
        }
    }

    /**
     * 删除
     */
    public function destroy($id){
        //修改状态值
        $bol=RP::where(['rp_id'=>$id,'rp_del'=>0])->update(['rp_del'=>1]);
        //判断
        if($bol!==false){
            //跳转
            return redirect('/role_power');
        }else{
            //跳转
            return redirect('/role_power');
        }
    }
}
