<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collaborator extends Model
{
    protected $fillable = [
        'user_id', 'project_id', 'role', 'is_approved'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function project() {
        return $this->belongsTo('App\Models\Project');
    }
}
