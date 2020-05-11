<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Project;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    public function store(Request $request, Project $project) {
        $board = $request->board;
        $data = $request->validate([
            'content' => 'required'
        ]);
        $data['user_id'] = Auth::id();
        $data[$board.'_id'] = $$board->id;
        Reply::create($data);
        return redirect()->back()
            ->with('alert', '댓글이 등록되었습니다.');
    }
}
