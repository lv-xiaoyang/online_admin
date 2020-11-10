<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TeacherModel extends Model
{
    //////指定表名
    protected $table="lectreg";
    // 指定主键id
    protected $primaryKey="lereg_id";
    // 关闭时间chuo1
    public $timestamps = false;
    // 黑名单
    protected $guarded = [];
}
