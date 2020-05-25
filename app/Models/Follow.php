<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Follow extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'followee_id'
    ];

    public function user() {
        return $this->belongsTo('App\User', 'id', 'user_id');
    }

    public function followee() {
        return $this->belongsTo('App\User', 'id', 'followee_id');
    }
}
