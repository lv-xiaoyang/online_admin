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
    return view('admin.index');
});

/**
 * 课程管理
 */
Route::prefix('course')->group(function(){
    /**
     * 课程类型管理
     */
    Route::prefix('type')->group(function(){
        //课程类型展示
        //Route::get('/','');
    });
});
