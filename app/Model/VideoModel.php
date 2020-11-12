<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class VideoModel extends Model
{
    protected $table = 'course_video';
    protected $primaryKey = 'video_id';
    public $timestamps = false;
}
