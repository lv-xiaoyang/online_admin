<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * 角色展示方法
     */
    public function index(){
        //渲染视图
        return view('admin/roles/index');
    }

    /**
     * 角色添加方法
     */
    public function create(){
        //渲染视图
        return view('admin/roles/create');
    }
}
