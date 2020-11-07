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
// Route::get('');


//rbac
Route::prefix("rbac")->group(function(){
	Route::get("admin/index","Admin\AdminController@index");
});




//题库
Route::prefix("/question")->group(function(){
	Route::get("/index","Admin\QuestionController@index");
	Route::get("/jianindex","Admin\QuestionController@jianindex");//简答题展示
	Route::get("/jianadd","Admin\QuestionController@jianadd");//简答题添加

	Route::get("/danindex","Admin\QuestionController@danindex");//单选题题展示
	Route::get("/danadd","Admin\QuestionController@danadd");//单选题添加

	Route::get("/duoindex","Admin\QuestionController@duoindex");//多选题展示
	Route::get("/duoadd","Admin\QuestionController@duoadd");//多选题添加

});

