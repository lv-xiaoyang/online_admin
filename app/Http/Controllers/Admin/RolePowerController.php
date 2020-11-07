<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RolePowerController extends Controller
{
    /**
     * 角色权限展示方法
     */
    public function index(){
        //渲染视图
        return view('admin/role_power/index');
    }

    /**
     * 角色权限添加方法
     */
    public function create(){
        //渲染视图
        return view('admin/role_power/create');
    }
}
