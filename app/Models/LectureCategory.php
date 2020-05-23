<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LectureCategory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'description', 'thumbnail_img', 'price'
    ];
}
