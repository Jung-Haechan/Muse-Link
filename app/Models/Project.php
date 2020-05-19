<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'title', 'genre', 'youtube_url', 'description', 'cover_img_file'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function versions() {
        return $this->hasMany('App\Models\Version');
    }

    public function collaborators() {
        return $this->hasMany('App\Models\Collaborator');
    }

    public function replies() {
        return $this->hasMany('App\Models\Reply');
    }

    public function likes() {
        return $this->hasMany('App\Models\Like');
    }

    public function scopeListAll($query, $open_range, $board) {
        if ($board === 'collaboration') {
            return $query->where('is_completed', false)->where('is_opened', $open_range)->latest();
        } else {
            return $query->where('is_completed', true)->where('is_opened', $open_range)->latest();
        }
    }
}
