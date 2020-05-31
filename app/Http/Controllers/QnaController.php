<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Qna;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class QnaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index() {
        return view('cs.qna.index', [
            'qnas' => Qna::latest()->paginate(10),
        ]);
    }

    public function show(Post $post) {
        return view('post.show.app', [
            'post' => $post,
            'post_next' => Post::getNeighbor($post, 'next')->first(),
            'post_previous' => Post::getNeighbor($post, 'previous')->first(),
            'replies' => $post->replies,
        ]);
    }

    public function create() {

        return view('post.create');
    }

    public function store(Request $request) {
        if(!Auth::check()) {
            return redirect()->back()
                ->with('alert', '로그인 후 이용 가능합니다.');
        }
        $data = $request->validate([
            'question' => 'required',
        ]);
        $data['user_id'] = Auth::id();
        Qna::create($data);
        return redirect()->route('qna.index')
            ->with('alert', '질문 등록 완료');
    }

    public function update_answer(Request $request, Qna $qna) {
        $data = $request->validate([
            'answer' => 'nullable',
        ]);
        $data['answered_at'] = now()->toDateTime();
        $qna->update($data);
        return redirect()->route('qna.index')
            ->with('alert', '답변이 완료되었습니다.');
    }

    public function delete(Qna $qna) {
        $qna->delete();
        return redirect()->route('qna.index')
            ->with('alert', '질문이 삭제되었습니다.');
    }
}
