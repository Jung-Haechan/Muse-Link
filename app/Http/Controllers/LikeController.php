<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function show(Project $project) {
        // Likes 테이블에 기록 있는지 없는지 확인
        $already_like = 0;
        if(Auth::check()) {
            $already_like = Like::where('project_id', $project->id)->where('user_id', Auth::id())->count();
        }
        // 좋아요 개수 가져오기
        $like_number = Like::where('project_id', $project->id)->count();
        return response()->json([
            'already_like' => $already_like,
            'like_number' => $like_number,
        ], 200);
    }

    public function store(Project $project) {
        Like::create([
            'user_id' => Auth::id(),
            'project_id' => $project->id,
        ]);
    }
}
