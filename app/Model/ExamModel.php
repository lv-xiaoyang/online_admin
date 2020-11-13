<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ExamModel extends Model
{
    //////表名
    protected $table = 'exam';
    //主键
    protected $primaryKey = 'exam_id';
    //时间戳
    public $timestamps = false;
    //黑名单  用create添加的时候加黑名单
    protected $guarded = [];
}
