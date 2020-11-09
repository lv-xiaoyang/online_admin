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
    Route::prefix('/type')->group(function(){
        Route::get("/create","Course\CourseTypeController@create");//课程分类添加
        Route::post("/add","Course\CourseTypeController@add");//课程分类确认添加
        Route::get("/index","Course\CourseTypeController@index");//课程分类展示
    });
    
    Route::get("/create","Course\CourseController@create");//课程添加
    Route::post("/add","Course\CourseController@add");//课程确认添加
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




//题库
Route::prefix("/question")->group(function(){
	Route::get("/index","Admin\QuestionController@index");
	Route::get("/jianindex","Admin\QuestionController@jianindex");//简答题展示
	Route::get("/jianadd","Admin\QuestionController@jianadd");//简答题添加
    Route::post("/jianaddo","Admin\QuestionController@jianaddo");//简答题执行添加
	Route::get("/danindex","Admin\QuestionController@danindex");//单选题题展示
	Route::get("/danadd","Admin\QuestionController@danadd");//单选题添加
    Route::post("/danadddo","Admin\QuestionController@danadddo");//单选题执行添加
	Route::get("/duoindex","Admin\QuestionController@duoindex");//多选题展示
	Route::get("/duoadd","Admin\QuestionController@duoadd");//多选题添加
    Route::post("/duoadddo","Admin\QuestionController@duoadddo");//多选题执行添加
});

