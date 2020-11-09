<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * 管理员展示方法
     */
    public function index(){
        //渲染视图
        return view('admin/admin/index');
    }

    /**
     * 管理员添加方法
     */
    public function create(){
        //渲染视图
        return view('admin/admin/create');
    }
}