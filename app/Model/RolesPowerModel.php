<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RolesPowerModel extends Model
{
    //指定表名
    protected $table='online_role_power';
    //指定主键
    protected $primaryKey='rp_id';
    //关闭时间戳
    public $timestamps=false;
}
