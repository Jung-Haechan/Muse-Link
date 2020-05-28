<?php

namespace App;

use App\Models\Exhibit;
use App\Models\Version;
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
        'name', 'email', 'resource_server', 'profile_img', 'introduce', 'is_composer', 'is_editor', 'is_lyricist', 'is_singer', 'producer_exhibit_id', 'singer_exhibit_id', 'gender'
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
        return $this->hasMany('App\Models\Exhibit')->latest();
    }

    public function producer_exhibit() {
        return $this->hasOne('App\Models\Exhibit', 'id', 'producer_exhibit_id');
    }

    public function singer_exhibit() {
        return $this->hasOne('App\Models\Exhibit', 'id', 'singer_exhibit_id');
    }

    public function projects() {
        return $this->hasMany('App\Models\Project');
    }

    public function posts() {
        return $this->hasMany('App\Models\Project');
    }

    public function versions() {
        return $this->hasMany('App\Models\Version');
    }

    public function notices() {
        return $this->hasMany('App\Models\Notice');
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

    public function getIsProducerAttribute() {
        return $this->is_composer || $this->is_editor || $this->is_lyricist;
    }

    public function scopeListAll($query, $board) {
        if ($board === 'producer') {
            return $query->where('is_composer', true)->orWhere('is_lyricist', true)->orWhere('is_editor', true)
                ->orderByDesc(
                    Exhibit::select('created_at')
                        ->where('role', '!=', 'singer')
                        ->whereColumn('user_id', 'users.id')
                        ->orderByDesc('created_at')
                        ->limit(1)
                );
        } else {
            return $query->where('is_singer', true)
                ->orderByDesc(
                    Exhibit::select('created_at')
                        ->where('role', 'singer')
                        ->whereColumn('user_id', 'users.id')
                        ->orderByDesc('created_at')
                        ->limit(1)
                );;
        }
    }
}
