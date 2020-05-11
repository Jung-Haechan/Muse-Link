<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reply extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'project_id', 'post_id', 'lecture_id', 'parent_id', 'content'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function project() {
        return $this->belongsTo('App\Models\Project');
    }
}
