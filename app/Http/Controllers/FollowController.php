<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function store(User $user) {
        $data = [
            'user_id' => Auth::id(),
            'followee_id' => $user->id,
        ];
        Follow::create($data);
    }

    public function delete(User $user) {
        $user->follows()->delete();
    }
}
