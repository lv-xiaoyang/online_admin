<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PowerController extends Controller
{
    /**
     * 权限展示方法
     */
    public function index(){
        //渲染视图
        return view('admin/power/index');
    }

    /**
     * 权限添加方法
     */
    public function create(){
        //渲染视图
        return view('admin/power/create');
    }
}
