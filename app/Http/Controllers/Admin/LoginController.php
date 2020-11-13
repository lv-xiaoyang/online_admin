<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//引入管理员model
use App\Model\AdminModel;

class LoginController extends Controller
{
    /**
     * 执行登录
     */
    public function loginDo(){
        //接值
        $data=request()->except('_token');
        //判断
        if(empty($data['admin_name'])){
            //返回
            return json_encode(['status'=>'no','msg'=>'用户名不可为空，请填写。']);
        }
        if(empty($data['admin_pwd'])){
            //返回
            return json_encode(['status'=>'no','msg'=>'密码不可为空，请填写。']);
        }
        //查询
        $admin_info=AdminModel::where(['admin_name'=>$data['admin_name']])->first();
        //判断
        if(!empty($admin_info)){
            //存在 验证密码
            if(password_verify($data['admin_pwd'],$admin_info->admin_pwd)){
                //登录成功
                //存session
                session(['admin_info'=>$admin_info]);
                //返回
                return json_encode(['status'=>'ok','msg'=>'登录成功。']);
            }else{
                //登录失败
                return json_encode(['status'=>'no','msg'=>'用户名或密码错误，请重新填写。']);
            }
        }else{
            //不存在
            return json_encode(['status'=>'no','msg'=>'用户名或密码错误，请重新填写。']);
        }
    }
}
