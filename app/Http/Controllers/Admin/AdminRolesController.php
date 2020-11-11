<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//引入管理员model
use App\Model\AdminModel;
//引入角色model
use App\Model\RolesModel;
//引入管理员角色 model
use App\Model\AdminRolesModel as AR;

class AdminRolesController extends Controller
{
    /**
     * 管理员角色展示方法
     */
    public function index(){
        //查询
        $data=AR::select('online_admin_role.*','admin_name')
                ->leftjoin('online_admin','online_admin_role.admin_id','=','online_admin.admin_id')
                ->where(['ar_del'=>0])
                ->get();
        //循环获取角色名称
        foreach($data as $k=>$v){
            //切割
            $ro_id=explode(',',$v->ro_id);
            //循环查询角色名称
            foreach($ro_id as $k1=>$v1){
                $v->ro_name.=RolesModel::where('ro_id',$v1)->value('ro_name').',';
            }
            //去除多余字符
            $v->ro_name=substr($v->ro_name,0,strlen($v->ro_name)-1);
        }
        //渲染视图
        return view('admin/admin_roles/index',compact('data'));
    }

    /**
     * 管理员角色添加方法
     */
    public function create(){
        //查询管理员
        $admin_data=AdminModel::where(['admin_del'=>0])->get();
        //查询角色
        $roles_data=RolesModel::get();
        //渲染视图
        return view('admin/admin_roles/create',compact('admin_data','roles_data'));
    }

    /**
     * 管理员角色 验证管理员唯一
     */
    public function admin_unique(){
        //接收管理员id
        $admin=request()->except('_token');
        //查询
        $admin_id=AR::where(['admin_id'=>$admin,'ar_del'=>0])->count();
        //判断
        if($admin_id==0){
            //返回
            return json_encode(["status"=>"ok"]);
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
        if(empty($data['admin_id'])){
            //返回
            return json_encode(['status'=>'fail','field'=>'admin','msg'=>'<b style="color: red">× 请选择管理员。</b>']);
        }else{
            //验证唯一
            $admin_id=AR::where(['admin_id'=>$data['admin_id'],'ar_del'=>0])->count();
            //判断
            if($admin_id!=0){
                //返回
                return json_encode(['status'=>'fail','field'=>'admin','msg'=>'<b style="color: red">× 该管理员已存在，请重新选择。</b>']);
            }
        }
        if(empty($data['ro_id'])){
            //返回
            return json_encode(['status'=>'fail','field'=>'ro','msg'=>'<b style="color: red">× 请选择角色</b>']);
        }
        //添加时间
        $data['ar_time']=time();
        //添加
        $bol=AR::insert($data);
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
        //查询管理员
        $admin_data=AdminModel::where(['admin_del'=>0])->get();
        //查询角色
        $roles_data=RolesModel::get();
        //查询当前数据
        $info=AR::where('ar_id',$id)->first();
        //处理角色id
        $info->ro_id=explode(',',$info->ro_id);
        //渲染视图
        return view('admin/admin_roles/edit',compact('admin_data','roles_data','info'));
    }

    /**
     * 修改 验证管理员
     */
    public function admin_unique_update($id){
        //接收管理员id
        $admin_id=request()->except('_token');
        //where 条件
        $where=[
            ['admin_id','=',$admin_id],
            ['ar_id','!=',$id],
            ['ar_del','=',0]
        ];
        //查询
        $admin_id=AR::where($where)->count();
        //判断
        if($admin_id==0){
            //返回
            return json_encode(["status"=>"ok"]);
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
        if(empty($data['admin_id'])){
            //返回
            return json_encode(['status'=>'fail','field'=>'admin','msg'=>'<b style="color: red">× 请选择管理员。</b>']);
        }else{
            //where 条件
            $where=[
                ['admin_id','=',$data['admin_id']],
                ['ar_id','!=',$id],
                ['ar_del','=',0]
            ];
            //验证唯一
            $admin_id=AR::where($where)->count();
            //判断
            if($admin_id!=0){
                //返回
                return json_encode(['status'=>'fail','field'=>'admin','msg'=>'<b style="color: red">× 该管理员已存在，请重新选择。</b>']);
            }
        }
        if(empty($data['ro_id'])){
            //返回
            return json_encode(['status'=>'fail','field'=>'ro','msg'=>'<b style="color: red">× 请选择角色</b>']);
        }
        //添加时间
        $data['ar_time']=time();
        //添加
        $bol=AR::where('ar_id',$id)->update($data);
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
        //删除 修改状态值
        $bol=AR::where('ar_id',$id)->update(['ar_del'=>1]);
        //判断
        if($bol!==false){
            return redirect('/admin_role');
        }else{
            return redirect('/admin_role');
        }
    }
}
