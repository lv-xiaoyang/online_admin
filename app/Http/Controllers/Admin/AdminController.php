<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //rbac管理员控制器
    public function index(){
    	// 管理员展示
    	return view("rbac.admin.index");
    }
    // 管理员添加
    public function create(){
    	return view("rbac.admin.create");
    }
    //管理员执行添加
    public function store(){}
    // 管理员修改
    public function upd(){}
    // 管理员执行修改
    public function update(){}
    // 管理员删除
    public function del($id){}
}