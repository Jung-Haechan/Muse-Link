<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    protected $fillable = [
        'user_id', 'project_id', 'title', 'description', 'project_audio_file', 'voice_audio_file', 'lyrics'
    ];
    public function project() {
        return $this->belongsTo('App\Models\Project');
    }

    public function scopeListVersions($query, $open_range) {
        return $query->where('is_opened', $open_range);
    }
}
