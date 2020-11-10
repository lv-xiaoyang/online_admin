<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    //指定表名
    protected $table='online_admin';
    //指定主键
    protected $primaryKey='admin_id';
    //关闭时间戳
    public $timestamps=false;
}
