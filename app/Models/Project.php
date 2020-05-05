<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'title', 'genre', 'audio_file', 'youtube_url', 'description', 'cover_img_file', 'lyrics', 'composer', 'editor', 'lyricist', 'singer'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function scopeListMusic($query, $open_range, $board) {
        if ($board === 'collaboration') {
            return $query->where('is_completed', false)->where('is_opened', $open_range);
        } else {
            return $query->where('is_completed', true)->where('is_opened', $open_range);
        }
    }
}
