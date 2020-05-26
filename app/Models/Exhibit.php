<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Exhibit extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'title', 'description', 'audio_file', 'youtube_url', 'cover_img_file', 'lyrics', 'role', 'is_opened'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function scopeListAll($query, $board) {
        if ($board === 'producer') {
            return $query->where('role', '!=', 'singer')->latest();
        } else {
            return $query->where('role', 'singer')->latest();
        }
    }
}
