<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function likes() {
        return $this->hasMany('App\Models\Like');
    }

    public function replies() {
        return $this->hasMany('App\Models\Reply');
    }

    public function scopeListAll($query) {
        return $query->latest();
    }

    public function scopeGetNeighbor($query, $post, $n_or_p) {
        if ($n_or_p === 'next') {
            return $query->where('created_at', '>', $post->created_at)->limit(1);
        } else {
            return $query->where('created_at', '<', $post->created_at)->limit(1)->latest();
        }
    }
}
