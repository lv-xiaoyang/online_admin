<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//引入管理员model
use App\Model\AdminModel;

class AdminController extends Controller
{
    /**
     * 管理员展示方法
     */
    public function index(){
        //查询
        $data=AdminModel::where('admin_del',0)->get();
        //渲染视图
        return view('admin/admin/index',compact('data'));
    }

    /**
     * 管理员添加方法
     */
    public function create(){
        //渲染视图
        return view('admin/admin/create');
    }

    /**
     * 管理员名称验证唯一
     */
    public function unique(){
        //接值
        $admin_name=request()->except('_token');
        //查询
        $count=AdminModel::where(['admin_name'=>$admin_name,'admin_del'=>0])->count();
        //判断返回
        if($count==0){
            return 'ok';
        }else{
            return 'no';
        }
    }

    /**
     * 管理员执行添加
     */
    public function store(){
        //接值
        $data=request()->except('_token');
        //验证
        if(empty($data['admin_name'])){
            return json_encode(['status'=>'no','field'=>'admin_name','msg'=>"<b style='color: red'>× 管理员名称不可为空，请填写。</b>"]);
        }else{
            //查询
            $count=AdminModel::where(['admin_name'=>$data['admin_name'],'admin_del'=>0])->count();
            if($count!=0){
                return json_encode(['status'=>'no','field'=>'admin_name','msg'=>"<b style='color: red'>× 此管理员名称已存在，请重新填写。</b>"]);
            }
        }
        if(empty($data['admin_pwd'])){
            return json_encode(['status'=>'no','field'=>'admin_pwd','msg'=>"<b style='color: red'>× 密码不可为空，请填写。</b>"]);
        }
        //验证正则
        $reg='/^\w{6,}$/';
        if(!preg_match($reg,$data['admin_pwd'])){
            return json_encode(['status'=>'no','field'=>'admin_pwd','msg'=>"<b style='color: red'>× 密码最低6位，请重新填写。</b>"]);
        }
        if(empty($data['admin_pwds'])){
            return json_encode(['status'=>'no','field'=>'admin_pwds','msg'=>"<b style='color: red'>× 确认密码不可为空，请填写。</b>"]);
        }
        //验证正则
        $reg='/^\w{6,}$/';
        if(!preg_match($reg,$data['admin_pwd'])){
            return json_encode(['status'=>'no','field'=>'admin_pwds','msg'=>"<b style='color: red'>× 确认密码最低6位，请重新填写。</b>"]);
        }
        if($data['admin_pwds']!=$data['admin_pwd']){
            return json_encode(['status'=>'no','field'=>'admin_pwds','msg'=>"<b style='color: red'>× 两次密码不一致，请重新填写。</b>"]);
        }
        //处理密码
        unset($data['admin_pwds']);
        $data['admin_pwd']=password_hash($data['admin_pwd'], PASSWORD_BCRYPT);
        //添加时间
        $data['admin_time']=time();
        //添加
        $bol=AdminModel::insert($data);
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
        $info=AdminModel::where(['admin_id'=>$id,'admin_del'=>0])->first();
        //渲染视图
        return view('admin/admin/edit',compact('info'));
    }

    /**
     * 修改时的管理员名称验证唯一
     */
    public function unique_update($id){
        //接值
        $admin_name=request()->except('_token');
        //where 条件
        $where=[
            ['admin_name','=',$admin_name],
            ['admin_id','!=',$id],
            ['admin_del','=',0]
        ];
        //查询
        $count=AdminModel::where($where)->count();
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
        if(empty($data['admin_name'])){
            return json_encode(['status'=>'no','field'=>'admin_name','msg'=>"<b style='color: red'>× 管理员名称不可为空，请填写。</b>"]);
        }else{
            //where 条件
            $where=[
                ['admin_name','=',$data['admin_name']],
                ['admin_id','!=',$id],
                ['admin_del','=',0]
            ];
            //查询
            $count=AdminModel::where($where)->count();
            if($count!=0){
                return json_encode(['status'=>'no','field'=>'admin_name','msg'=>"<b style='color: red'>× 此管理员名称已存在，请重新填写。</b>"]);
            }
        }
        if(empty($data['admin_pwd'])){
            return json_encode(['status'=>'no','field'=>'admin_pwd','msg'=>"<b style='color: red'>× 密码不可为空，请填写。</b>"]);
        }
        //验证正则
        $reg='/^\w{6,}$/';
        if(!preg_match($reg,$data['admin_pwd'])){
            return json_encode(['status'=>'no','field'=>'admin_pwd','msg'=>"<b style='color: red'>× 密码最低6位，请重新填写。</b>"]);
        }
        if(empty($data['admin_pwds'])){
            return json_encode(['status'=>'no','field'=>'admin_pwds','msg'=>"<b style='color: red'>× 确认密码不可为空，请填写。</b>"]);
        }
        //验证正则
        $reg='/^\w{6,}$/';
        if(!preg_match($reg,$data['admin_pwd'])){
            return json_encode(['status'=>'no','field'=>'admin_pwds','msg'=>"<b style='color: red'>× 确认密码最低6位，请重新填写。</b>"]);
        }
        if($data['admin_pwds']!=$data['admin_pwd']){
            return json_encode(['status'=>'no','field'=>'admin_pwds','msg'=>"<b style='color: red'>× 两次密码不一致，请重新填写。</b>"]);
        }
        //处理密码
        unset($data['admin_pwds']);
        $data['admin_pwd']=password_hash($data['admin_pwd'], PASSWORD_BCRYPT);
        //添加时间
        $data['admin_time']=time();
        //添加
        $bol=AdminModel::where(['admin_id'=>$id,'admin_del'=>0])->update($data);
        //判断
        if($bol){
            return json_encode(['status'=>"ok"]);
        }else{
            return json_encode(['status'=>"no"]);
        }
    }

    /**
     * 删除
     */
    public function destroy($id){
        //删除
        $bol=AdminModel::where('admin_id',$id)->update(['damin_del'=>1]);
        //判断
        if($bol){
            return redirect('/admin');
        }else{
            return redirect('/admin');
        }
    }
}