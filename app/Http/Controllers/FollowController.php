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

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user, $board) {
        if ($board === 'follower') {
            $fellows = $user->followers()->paginate(12);
        } else {
            $fellows = $user->follows()->paginate(12);
        }
        return view('user.follow.index', [
            'user' => $user,
            'fellows' => $fellows,
            'board' => $board,
        ]);
    }

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
