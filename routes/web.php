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
    //管理员名称验证唯一
    Route::post('admin_name_unique','Admin\AdminController@unique');
    //执行添加
    Route::post('store','Admin\AdminController@store');
    //编辑页面
    Route::get('edit/{id}','Admin\AdminController@edit');
    //修改 管理员名称验证唯一
    Route::post('admin_name_unique_update/{id}','Admin\AdminController@unique_update');
    //修改
    Route::post('update/{id}','Admin\AdminController@update');
    //删除
    Route::get('destroy/{id}','Admin\RolesController@destroy');
});

/**
 * 角色管理 路由组
 */
Route::prefix('roles')->group(function(){
    //角色展示页面
    Route::get('/','Admin\RolesController@index');
    //角色添加页面
    Route::get('create','Admin\RolesController@create');
    //角色名称验证唯一
    Route::post('ro_name_unique','Admin\RolesController@unique');
    //执行添加
    Route::post('store','Admin\RolesController@store');
    //编辑页面
    Route::get('edit/{id}','Admin\RolesController@edit');
    //修改 角色名称验证唯一
    Route::post('ro_name_unique_update/{id}','Admin\RolesController@unique_update');
    //修改
    Route::post('update/{id}','Admin\RolesController@update');
    //删除
    Route::get('destroy/{id}','Admin\RolesController@destroy');
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
    //管理员角色 验证管理员唯一
    Route::post('admin_unique','Admin\AdminRolesController@admin_unique');
    //执行添加
    Route::post('store','Admin\AdminRolesController@store');
    //编辑页面
    Route::get('edit/{id}','Admin\AdminRolesController@edit');
    //修改 验证管理员唯一
    Route::post('admin_unique_update/{id}','Admin\AdminRolesController@admin_unique_update');
    //修改
    Route::post('update/{id}','Admin\AdminRolesController@update');
    //删除
    Route::get('destroy/{id}','Admin\AdminRolesController@destroy');
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
    Route::get("/addimg","Course\CourseController@addimg");//图片上传处理
    Route::post("/add","Course\CourseController@add");//课程确认添加
    Route::post("/chapter","Course\CourseController@chapter");//获取章程数据
    Route::post("/section","Course\CourseController@section");//获取节数据
    Route::post("/courseclass","Course\CourseController@courseclass");//获取课时数据
    Route::get("/index","Course\CourseController@list");//课程展示
    Route::get("/del","Course\CourseController@del");//课程添加



    Route::prefix('section')->group(function(){
        Route::get("/create","Course\SectionController@create");//章程添加
        Route::post("/add","Course\SectionController@add");//章程确认添加
    });
    Route::prefix('knob')->group(function(){
        Route::get("/create","Course\KnobController@create");//节添加
        Route::post("/add","Course\KnobController@add");//节确认添加
        Route::post("/chapter","Course\KnobController@chapter");//获取章程数据
    });
    Route::prefix('hour')->group(function(){
        Route::get("/create","Course\HourController@create");//课时添加
        Route::post("/add","Course\HourController@add");//课时确认添加
        Route::post("/chapter","Course\HourController@chapter");//获取章程数据
        Route::post("/section","Course\HourController@section");//获取节数据
        
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
    Route::post("danupdate/{id}","Admin\QuestionController@danupdate");
	Route::get("/duoindex","Admin\QuestionController@duoindex");//多选题展示
	Route::get("/duoadd","Admin\QuestionController@duoadd");//多选题添加
    Route::post("/duoadddo","Admin\QuestionController@duoadddo");//多选题执行添加
    Route::get("/del/{id}","Admin\QuestionController@del");//删除
    Route::get("/upd/{id}","Admin\QuestionController@upd");//修改
    Route::post("/jianupdate","Admin\QuestionController@update");//执行修改
    Route::get("/huifuindex","Admin\QuestionController@huifuindex");//恢复删除页面
    Route::get("/huifudel/{id}","Admin\QuestionController@huifudel");//执行恢复
    Route::get("/course/{id}","Admin\QuestionController@course");
    Route::get("/courses","Admin\QuestionController@courses");
    Route::get("/sectionn","Admin\QuestionController@sectionn");
    Route::get("/coursec","Admin\QuestionController@coursec");
    Route::get("/coursecreate","Admin\QuestionController@coursecreate");
});


//讲师模块
Route::prefix("/teacher")->group(function(){
    Route::get("/","Admin\TeacherController@index");
    Route::get("/del/{id}","Admin\TeacherController@del");
    Route::get("/upd/{id}","Admin\TeacherController@upd");
    Route::post("/update/{id}","Admin\TeacherController@update");
});

