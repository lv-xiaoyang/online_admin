<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PowerModel extends Model
{
    //指定表名
    protected $table='online_power';
    //指定主键
    protected $primaryKey='pow_id';
    //关闭时间戳
    public $timestamps=false;
}
