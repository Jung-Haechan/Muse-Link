<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Exhibit extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function scopeListAll($query, $board) {
        if ($board === 'producer') {
            return $query->where('role', '!=', 'singer')->latest();
        } else {
            return $query->where('role', 'singer')->latest();
        }
    }
}
