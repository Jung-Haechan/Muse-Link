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
        'user_id', 'title', 'genre', 'youtube_url', 'description', 'cover_img_file', 'views', 'completed_at', 'is_opened',
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

    public function composers() {
        if($this->collaborators()->where('role', 'composer')->first()) {
            return $this->collaborators()->where('role', 'composer');
        } else {
            return $this->collaborators()->where('role', 'master');
        }
    }

    public function editors() {
        if($this->collaborators()->where('role', 'editor')->first()) {
            return $this->collaborators()->where('role', 'editor');
        } else {
            return $this->collaborators()->where('role', 'master');
        }
    }

    public function lyricists() {
        if($this->collaborators()->where('role', 'lyricist')->first()) {
            return $this->collaborators()->where('role', 'lyricist');
        } else {
            return $this->collaborators()->where('role', 'master');
        }
    }

    public function singers() {
        if($this->collaborators()->where('role', 'singer')->first()) {
            return $this->collaborators()->where('role', 'singer');
        } else {
            return $this->collaborators()->where('role', 'master');
        }
    }

    public function scopeListAll($query, $board, $period = NULL) {
        if ($board === 'collaboration') {
            return $query->whereNull('completed_at')
                ->orderByDesc(
                    Version::select('created_at')
                        ->whereColumn('project_id', 'projects.id')
                        ->orderByDesc('created_at')
                        ->limit(1)
                );
        }
        elseif ($board === 'completed') {
            return $query->whereNotNull('completed_at')
                ->orderByDesc('completed_at');
        }
        elseif ($board === 'chart') {
            $query->whereNotNull('completed_at')
                ->withCount(['likes as likes_'.$period => function($query) use($period) {
                    return $query->where('created_at', '>', getLastPeriod($period));
                }])
                ->orderByDesc('likes_'.$period);
        }
    }
}
