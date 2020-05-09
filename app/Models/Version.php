<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Version extends Model
{
    protected $fillable = [
        'user_id', 'project_id', 'title', 'description', 'project_audio_file', 'voice_audio_file', 'lyrics'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function project() {
        return $this->belongsTo('App\Models\Project');
    }

    public function scopeListVersions($query, $open_range) {
        DB::statement(DB::raw('set @rownum:=0'));
        return $query->where('is_opened', $open_range)
            ->selectRaw('*, @rownum:=@rownum+1 as rownum')
            ->orderByDesc('id');
    }
}
