<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Version extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'project_id', 'title', 'description', 'project_audio_file', 'mr_audio_file', 'voice_audio_file', 'lyrics', 'role'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function project() {
        return $this->belongsTo('App\Models\Project');
    }

    public function scopeListVersions($query, $open_range) {
        $count = $query->where('is_opened', $open_range)
            ->orderByDesc('id')->count();
        DB::statement(DB::raw('set @rownum:=1+'.$count));
        return $query->where('is_opened', $open_range)
            ->selectRaw('*, @rownum:=@rownum-1 as rownum')
            ->orderByDesc('id');
    }
}
