<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminRolesController extends Controller
{
    /**
     * 管理员角色展示方法
     */
    public function index(){
        //渲染视图
        return view('admin/admin_roles/index');
    }

    /**
     * 管理员角色添加方法
     */
    public function create(){
        //渲染视图
        return view('admin/admin_roles/create');
    }
}
