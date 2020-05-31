<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Project;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, $id) {
        $board = $request->segment(1);
        $data = $request->validate([
            'content' => 'required'
        ]);
        $data['user_id'] = Auth::id();
        $data[$board.'_id'] = $id;
        Reply::create($data);
        return redirect()->back()
            ->with('alert', '댓글이 등록되었습니다.');
    }

    public function delete($id, Reply $reply) {
        $reply->delete();
        return redirect()->back()
            ->with('alert', '댓글이 삭제되었습니다.');
    }
}
