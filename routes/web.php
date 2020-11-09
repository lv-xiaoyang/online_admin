<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin.indexs');
})->name('indexs');


/**
 * 后台 RBAC 模块
 */
/**
 * 管理员管理 路由组
 */
Route::prefix('admin')->group(function(){
    //管理员展示页面
    Route::get('/','Admin\AdminController@index');
    //管理员添加页面
    Route::get('create','Admin\AdminController@create');
});

/**
 * 角色管理 路由组
 */
Route::prefix('roles')->group(function(){
    //角色展示页面
    Route::get('/','Admin\RolesController@index');
    //角色添加页面
    Route::get('create','Admin\RolesController@create');
});

/**
 * 权限管理 路由组
 */
Route::prefix('power')->group(function(){
    //权限展示页面
    Route::get('/','Admin\PowerController@index');
    //权限添加页面
    Route::get('create','Admin\PowerController@create');
    //权限名称验证唯一
    Route::post('pow_name_unique','Admin\PowerController@unique');
    //权限验证唯一
    Route::post('pow_url_unique','Admin\PowerController@url_unique');
    //执行添加
    Route::post('store','Admin\PowerController@store');
    //编辑页面
    Route::get('edit/{id}','Admin\PowerController@edit');
    //修改 权限名称验证唯一
    Route::post('pow_name_unique_update/{id}','Admin\PowerController@unique_update');
    //修改 权限验证唯一
    Route::post('pow_url_unique_update/{id}','Admin\PowerController@url_unique_update');
    //修改
    Route::post('update/{id}','Admin\PowerController@update');
    //删除
    Route::get('destroy/{id}','Admin\PowerController@destroy');
});

/**
 * 管理员角色管理 路由组
 */
Route::prefix('admin_role')->group(function(){
    //管理员角色展示页面
    Route::get('/','Admin\AdminRolesController@index');
    //管理员角色添加页面
    Route::get('create','Admin\AdminRolesController@create');
});

/**
 * 角色权限管理 路由组
 */
Route::prefix('role_power')->group(function(){
    //角色权限展示页面
    Route::get('/','Admin\RolePowerController@index');
    //角色权限添加页面
    Route::get('create','Admin\RolePowerController@create');
});





//课程
Route::prefix("/course")->group(function(){
    Route::get("/create","Course\CourseController@create");//课程添加
    Route::get("/index","Course\CourseController@list");//课程展示
    Route::prefix('section')->group(function(){
        Route::get("/create","Course\SectionController@create");//章程添加
    });
    Route::prefix('knob')->group(function(){
        Route::get("/create","Course\KnobController@create");//节添加
    });
    Route::prefix('hour')->group(function(){
        Route::get("/create","Course\HourController@create");//课时添加
    });
});
