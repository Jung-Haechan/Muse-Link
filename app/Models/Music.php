<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Music extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'title', 'genre', 'audio_file', 'youtube_url', 'description', 'cover_img_file', 'lyrics', 'composer', 'editor', 'lyricist', 'singer'
    ];
}
