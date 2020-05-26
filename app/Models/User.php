<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    use HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'resource_server', 'profile_img', 'introduce', 'is_composer', 'is_editor', 'is_lyricist', 'is_singer', 'face_exhibit_id'
    ];

    protected $attributes = [
        'is_composer' => false,
        'is_editor' => false,
        'is_lyricist' => false,
        'is_singer' => false,
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function exhibits() {
        return $this->hasMany('App\Models\Exhibit');
    }

    public function face_exhibit() {
        return $this->hasOne('App\Models\Exhibit', 'id', 'face_exhibit_id');
    }

    public function projects() {
        return $this->hasMany('App\Models\Project');
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

    public function follows() {
        return $this->hasMany('App\Models\Follow');
    }

    public function followers() {
        return $this->hasMany('App\Models\Follow', 'followee_id', 'id');
    }

    public function scopeListAll($query, $board) {
        if ($board === 'producer') {
            return $query->where('is_composer', true)->orWhere('is_lyricist', true)->orWhere('is_editor', true)->latest();
        } else {
            return $query->where('is_singer', true)->latest();
        }
    }
}
