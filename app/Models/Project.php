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

    public function scopeListProjects($query, $open_range, $board) {
        if ($board === 'collaboration') {
            return $query->where('is_completed', false)->where('is_opened', $open_range);
        } else {
            return $query->where('is_completed', true)->where('is_opened', $open_range);
        }
    }
}
