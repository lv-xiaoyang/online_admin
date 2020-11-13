<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ArticleModel extends Model
{
    //指定表名
    protected $table='article';
    //指定主键
    protected $primaryKey='ati_id';
    //关闭时间戳
    public $timestamps=false;
}
