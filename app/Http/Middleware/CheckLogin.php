<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
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
        //取出session 信息
        $admin=session('admin_info');
        //判断是否登录
        if(empty($admin)){
            //去登录
            return redirect('/login');
        }
        return $next($request);
    }
}
