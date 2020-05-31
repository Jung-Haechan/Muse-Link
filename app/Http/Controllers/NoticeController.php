<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoticeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index() {
        $notices = Notice::latest()->paginate(15);
        return view('cs.notice.index', [
            'notices' => $notices
        ]);
    }

    public function show(Notice $notice) {
        return view('cs.notice.show', [
            'notice' => $notice,
        ]);
    }

    public function create() {
        if(!isAdmin(Auth::user())) {
            return redirect()->back()
                ->with('alert', '권한이 없습니다.');
        }
        return view('cs.notice.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        Notice::create($data);
        return redirect()->route('notice.index')
            ->with('alert', '공지 등록 완료');
    }

    public function edit(Notice $notice) {
        return view('cs.notice.edit', [
            'notice' => $notice,
        ]);
    }

    public function update(Request $request, Notice $notice) {
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        $notice->update($data);
        return redirect()->route('notice.index')
            ->with('alert', '수정이 완료되었습니다.');
    }

    public function delete(Notice $notice) {
        $notice->delete();
        return redirect()->route('notice.index')
            ->with('alert', '게시글이 삭제되었습니다.');
    }
}
