<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Project extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'title', 'genre', 'youtube_url', 'description', 'cover_img_file', 'views', 'completed_at'
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

    public function audio_version() {
        return $this->hasOne('App\Models\Version', 'id', 'audio_version_id');
    }

    public function lyrics_version() {
        return $this->hasOne('App\Models\Version', 'id', 'lyrics_version_id');
    }

    public function getAlreadyLikeAttribute() {
        return $this->likes()->where('user_id', Auth::id())->first() !== NULL;
    }

    public function scopeListAll($query, $open_range, $board, $period = NULL) {
        if ($board === 'collaboration') {
            return $query->whereNull('completed_at')->where('is_opened', $open_range)->latest();
        }
        elseif ($board === 'completed') {
            return $query->whereNotNull('completed_at')->where('is_opened', $open_range)->orderBy('completed_at');
        }
        elseif ($board === 'chart' && $period === 'week') {
            DB::statement(DB::raw('set @rownum:=0'));
            $query->whereNotNull('completed_at')
                ->where('is_opened', $open_range)
                ->withCount(['likes as likes_week' => function($query) {
                    return $query->where('created_at', '>', getLastPeriod('week'));
                }])
                ->orderByDesc('likes_week');
        }
        elseif ($board === 'chart' && $period === 'month') {
            DB::statement(DB::raw('set @rownum:=0'));
            $query->whereNotNull('completed_at')
                ->where('is_opened', $open_range)
                ->withCount(['likes as likes_month' => function($query) {
                    return $query->where('created_at', '>', getLastPeriod('month'));
                }])
                ->orderByDesc('likes_month');
        }
    }
}
