<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdminRolesModel extends Model
{
    //指定表名
    protected $table='online_admin_role';
    //指定主键
    protected $primaryKey='ar_id';
    //关闭时间戳
    public $timestamps=false;
}
