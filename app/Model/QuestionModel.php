<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class QuestionModel extends Model
{


    ////表名
    protected $table = 'question';
    //主键
    protected $primaryKey = 'question_id';
    //时间戳
    public $timestamps = false;
    //黑名单  用create添加的时候加黑名单
    protected $guarded = [];

}
