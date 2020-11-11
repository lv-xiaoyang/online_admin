<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LectModel extends Model
{
    protected $table = 'lect';
    protected $primaryKey = 'lect_id';
    public $timestamps = false;
}
