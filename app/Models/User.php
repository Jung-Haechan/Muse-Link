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
        'name', 'email', 'resource_server', 'profile_img', 'introduce', 'is_composer', 'is_editor', 'is_lyricist', 'is_singer'
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

    public function projects() {
        return $this->hasMany('App\Models\Project');
    }

    public function versions() {
        return $this->hasMany('App\Models\Version');
    }

    public function collaborator() {
        return $this->hasMany('App\Models\Collaborator');
    }

    public function replies() {
        return $this->hasMany('App\Models\Reply');
    }
}
