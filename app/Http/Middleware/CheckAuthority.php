<?php

namespace App\Http\Middleware;

use Closure;
//引入管理员model
use App\Model\AdminModel as Admin;
//引入管理员 角色 model
use App\Model\AdminRolesModel as AR;
//引入角色 model
use App\Model\RolesModel as  Roles;
//引入角色 权限 model
use App\Model\RolesPowerModel as RP;
//引入 权限 model
use App\Model\PowerModel as Power;

class CheckAuthority
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //取出session信息
        $admin=session('admin_info');
        //取出session 中的 管理员 id
        $admin_id=$admin->admin_id;
        //获取访问的路由
        $url=$request->path();
        //判断路由
        if($url!='/'){
            $url='/'.$url;
        }else{
            //首页访问
            return $next($request);
        }
        //查询用户是否存在
        $admin_info=Admin::where(['admin_id'=>$admin_id,'admin_del'=>0])->value('admin_id');
        if(!empty($admin_info)){
            //查询角色
            $roles=AR::where(['admin_id'=>$admin_info,'ar_del'=>0])->first();
            //判断
            if(!empty($roles)){
                //获取最高角色的id
                $roles_id=Roles::where(['ro_name'=>'root'])->value('ro_id');
                //判断角色是否是最高角色
                if($roles->ro_id==$roles_id){
                    //最高角色 直接进入
                    return $next($request);
                }else{
                    //不是最高角色 查权限
                    //根据角色id找权限
                    $power=RP::where(['ro_id'=>$roles->ro_id,'rp_del'=>0])->first();
                    //分割权限id
                    $power_id=explode(',',$power->pow_id);
                    //权限数组
                    $power=[];
                    //循环查询权限
                    foreach($power_id as $k=>$v){
                        //存权限
                        $power[]=Power::where(['pow_id'=>$v])->value('pow_url');
                    }
                    //判断权限是否存在
                    if(in_array($url,$power)){
                        //具有权限 进入
                        return $next($request);
                    }else{
                        ///没有权限 返回
                        return back()->with('msg','非常抱歉，您不具备访问此功能的权限。');
                    }
                }
            }else{
                //没有角色
                return back()->with('msg','非常抱歉，您不具备访问此功能的权限。');
            }
        }else{
            //用户不存在
            return back()->with('msg','非常抱歉，您不具备访问此功能的权限。');
        }
    }
}
