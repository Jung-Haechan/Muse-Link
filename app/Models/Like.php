<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Like extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function project() {
        return $this->belongsTo('App\Models\Project');
    }

    public function post() {
        return $this->belongsTo('App\Models\Post');
    }

    public function lecture_category() {
        return $this->belongsTo('App\Models\LectureCategory');
    }
}
