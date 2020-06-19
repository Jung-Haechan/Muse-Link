<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LectureCategory extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function likes() {
        return $this->hasMany('App\Models\Like');
    }
}
