<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    use SoftDeletes;

    public function store(User $user) {
        $data = [
            'user_id' => Auth::id(),
            'followee_id' => $user->id,
        ];
        Follow::create($data);
    }

    public function delete(User $user) {
        Follow::where('user_id', Auth::id())->where('followee_id', $user->id)->delete();
    }
}
