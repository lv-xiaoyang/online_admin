<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ExamQuestionModel extends Model
{
    ////////表名
    protected $table = 'exam_question';
    //主键
    protected $primaryKey = 'eq_id';
    //时间戳
    public $timestamps = false;
    //黑名单  用create添加的时候加黑名单
    protected $guarded = [];
}
