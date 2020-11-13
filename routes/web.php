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
})->middleware('checkLogin','checkAuthority')->name('indexs');

/**
 * 后台登录页面
 */
Route::view('login','admin/login');
/**
 * 执行登录
 */
Route::post('loginDo','Admin\LoginController@loginDo');
/**
 * 退出登录
 */
Route::get('loginOut','Admin\LoginController@loginOut');

/**
 * 后台 RBAC 模块
 */
/**
 * 管理员管理 路由组
 */
Route::prefix('admin')->middleware('checkLogin','checkAuthority')->group(function(){
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
Route::prefix('roles')->middleware('checkLogin','checkAuthority')->group(function(){
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
Route::prefix('power')->middleware('checkLogin','checkAuthority')->group(function(){
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
Route::prefix('admin_role')->middleware('checkLogin','checkAuthority')->group(function(){
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
Route::prefix('role_power')->middleware('checkLogin','checkAuthority')->group(function(){
    //角色权限展示页面
    Route::get('/','Admin\RolePowerController@index');
    //角色权限添加页面
    Route::get('create','Admin\RolePowerController@create');
    //角色 验证唯一
    Route::post('unique','Admin\RolePowerController@unique');
    //执行添加
    Route::post('store','Admin\RolePowerController@store');
    //编辑页面
    Route::get('edit/{id}','Admin\RolePowerController@edit');
    //修改 验证角色唯一
    Route::post('unique_update/{id}','Admin\RolePowerController@unique_update');
    //修改
    Route::post('update/{id}','Admin\RolePowerController@update');
    //删除
    Route::get('destroy/{id}','Admin\RolePowerController@destroy');
});





//课程
Route::prefix("/course")->middleware('checkLogin','checkAuthority')->group(function(){
    Route::get("/create","Course\CourseController@create");//课程添加
    Route::get("/addimg","Course\CourseController@addimg");//图片上传处理
    Route::post("/add","Course\CourseController@add");//课程确认添加
    Route::post("/chapter","Course\CourseController@chapter");//获取章程数据
    Route::post("/section","Course\CourseController@section");//获取节数据
    Route::post("/courseclass","Course\CourseController@courseclass");//获取课时数据
    Route::get("/index","Course\CourseController@list")->name("course");//课程展示
    Route::get("/del","Course\CourseController@del");//课程添加
    Route::post("/addimg","Course\CourseController@addimg");//图片上传处理
    Route::post("/upload","Course\CourseController@upload");//视频上传处理


    Route::prefix('/type')->group(function(){
        Route::get("/create","Course\CourseTypeController@create");//课程分类添加
        Route::post("/add","Course\CourseTypeController@add");//课程分类确认添加
        Route::get("/index","Course\CourseTypeController@index");//课程分类展示
    });
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
    Route::prefix('/video')->group(function(){
        Route::get("/create","Course\VideoController@create");//视频添加
        Route::post("/add","Course\VideoController@add");//视频确认添加
    });
});




//题库
Route::prefix("/question")->group(function(){
	Route::get("/index","Admin\QuestionController@index")->name("question");//题库展示
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
    Route::get("/huifudel/{id}","Admin\QuestionCont roller@huifudel");//执行恢复
    Route::get("/course/{id}","Admin\QuestionController@course");//关联课程
    Route::get("/courses","Admin\QuestionController@courses");//四级联动查询章信息
    Route::get("/sectionn","Admin\QuestionController@sectionn");//四级联动查询节数据
    Route::get("/coursec","Admin\QuestionController@coursec");//四级联动查询课时数据
    Route::get("/coursecreate","Admin\QuestionController@coursecreate");//关联课程执行添加
    Route::post("/duoupdate","Admin\QuestionController@duoupdate");//多选题修改
    Route::get("/search","Admin\QuestionController@search");//
    Route::get("/dancount","Admin\QuestionController@dancount");//多选题\简答题\单选题 ajax 验证题干唯一性
});
 //考试模块
 Route::prefix("exam")->group(function(){
    Route::get("/add","Admin\ExamController@add");//添加考题
    //考试展示
    Route::get("/index","Admin\ExamController@index");
    //执行添加
    Route::post("/adddo","Admin\ExamController@adddo");
    // 添加单选题  
    Route::get("/danadd/{id}","Admin\ExamController@danadd");
    // 添加多选题
    Route::get("/duoadd/{id}","Admin\ExamController@duoadd");
    // 添加简答题
    Route::get("/jianadd/{id}","Admin\ExamController@jianadd");
    //执行添加单选题
    Route::get("/danadddo","Admin\ExamController@danadddo");
    Route::get("/duoadddo","Admin\ExamController@duoadddo");//添加多选题
    Route::get("/jianadddo","Admin\ExamController@jianadddo");//添加简答题
    Route::get("/looks/{id}","Admin\ExamController@looks");//查看考题
    Route::get("/delete/{id}","Admin\ExamController@delete");//查看考题删除
    Route::get("/examdel/{id}","Admin\ExamController@examdel");//停用
    //启用 
    Route::get("/examdel2/{id}","Admin\ExamController@examdel2");
    //验证名称唯一性
    Route::get("/exam_name","Admin\ExamController@exam_name");
    
 }); 


// 资讯模块
Route::prefix('/article')->group(function(){
    //资讯展示
    Route::get('/',"Admin\articleController@index")->name("atiIndexs");
    //资讯添加页面
    Route::get('/create',"Admin\articleController@create");
    //资讯执行添加
    Route::post('/story',"Admin\articleController@story");
    //资讯 修改页面
    Route::get('/update/{id}',"Admin\articleController@update");
    //资讯 删除
    Route::get('/del/{id}',"Admin\articleController@del");
    //资讯 修改
    Route::post('/update2/{id}',"Admin\articleController@update2");


});

//讲师模块
Route::prefix("/teacher")->middleware('checkLogin','checkAuthority')->group(function(){
    //讲师 展示
    Route::get("/","Admin\TeacherController@index")->name("teacher");
    //讲师 删除
    Route::get("/del/{id}","Admin\TeacherController@del");
    //讲师 修改页面
    Route::get("/upd/{id}","Admin\TeacherController@upd");
    //讲师 执行修改
    Route::post("/update/{id}","Admin\TeacherController@update");
    Route::get("/indexis","Admin\TeacherController@indexis")->name("indexis");//讲师审核展示
    Route::get("/tongguoshenhe","Admin\TeacherController@tongguoshenhe");//通过讲师审核
    Route::get("/weitongguo","Admin\TeacherController@weitongguo");//未通过审核
});

