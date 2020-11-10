<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RolesModel extends Model
{
    //指定表名
    protected $table='online_role';
    //指定主键
    protected $primaryKey='ro_id';
    //关闭时间戳
    public $timestamps=false;
}
