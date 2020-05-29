<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Collaborator extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'project_id', 'role', 'is_approved'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function project() {
        return $this->belongsTo('App\Models\Project');
    }

    public function getIsProducerAttribute() {
        return in_array($this->role, ['composer', 'editor', 'lyricist', 'master']);
    }

    public function scopeListJoined($query, $board) {
        if ($board === 'producer') {
            return $query->where('role', '!=', 'master')->where('role', '!=', 'singer');
        } else {
            return $query->where('role', 'singer');
        }
    }
}
