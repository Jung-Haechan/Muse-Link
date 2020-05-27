<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::listAll()->paginate(20);
        foreach($posts as $post) {
            $post['likes_num'] = $post->likes()->count();
        }
        return view('post.index', [
            'posts' => $posts,
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
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        $data['user_id'] = Auth::id();
        Post::create($data);
        return redirect()->route('post.index')
            ->with('alert', '게시글 등록 완료');
    }

    public function edit(Post $post) {
        return view('post.edit', [
            'post' => $post,
        ]);
    }

    public function update(Request $request, Post $post) {
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        $post->update($data);
        return redirect()->route('post.index')
            ->with('alert', '수정이 완료되었습니다.');
    }

    public function delete(Post $post) {
        $post->delete();
        return redirect()->route('post.index')
            ->with('alert', '게시글이 삭제되었습니다.');
    }
}
