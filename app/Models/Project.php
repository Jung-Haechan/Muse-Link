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
        return $this->hasMany('App\Models\Version')->latest();
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
            return $query->whereNull('completed_at')->where('is_opened', $open_range)
                ->orderByDesc(
                    Version::select('created_at')
                        ->whereColumn('project_id', 'projects.id')
                        ->orderByDesc('created_at')
                        ->limit(1)
                );
        }
        elseif ($board === 'completed') {
            return $query->whereNotNull('completed_at')->where('is_opened', $open_range)
                ->orderByDesc('completed_at');
        }
        elseif ($board === 'chart') {
            $query->whereNotNull('completed_at')
                ->where('is_opened', $open_range)
                ->withCount(['likes as likes_'.$period => function($query) use($period) {
                    return $query->where('created_at', '>', getLastPeriod($period));
                }])
                ->orderByDesc('likes_'.$period);
        }
    }
}
