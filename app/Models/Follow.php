<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Follow extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function user() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function followee() {
        return $this->belongsTo('App\User', 'followee_id', 'id');
    }
}
