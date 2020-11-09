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
});


//rbac
Route::prefix("rbac")->group(function(){
	Route::get("admin/indexs","Admin\AdminController@index");
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
