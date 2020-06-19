<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function sender() {
        return $this->belongsTo('App\User', 'id', 'sender_id');
    }

    public function receiver() {
        return $this->belongsTo('App\User', 'id', 'receiver_id');
    }


}
