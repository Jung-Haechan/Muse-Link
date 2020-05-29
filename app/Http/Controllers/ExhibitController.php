<?php

namespace App\Http\Controllers;

use App\Models\Exhibit;
use App\Models\Project;
use App\Models\Version;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExhibitController extends Controller
{
    public function create(User $user, $board) {
        return view('user.'.$board.'.exhibit.create', [
            'user' => $user,
        ]);
    }

    public function store(User $user, $board, Request $request) {
        $data = $request->validate([
            'title' => 'required|max:255',
            'is_opened' => 'required',
            'role' => 'required',
            'description' => 'required',
            'youtube_url' => 'nullable|max:255|url',
            'lyrics' => 'nullable',
        ]);
        $data['user_id'] = Auth::id();
        if ($request->hasFile('cover_img_file')) {
            if (getFileType($request->file('cover_img_file')) === 'image') {
                $data['cover_img_file'] = $request->file('cover_img_file')->store('public//cover');
            } else {
                return redirect()->back()
                    ->with('alert', '이미지 파일 형식이 잘못되었습니다.');
            }
        }
        if ($request->hasFile('audio_file')) {
            if (getFileType($request->file('audio_file')) === 'audio') {
                $data['audio_file'] = $request->file('audio_file')->store('public/audio/exhibit');
            } else {
                return redirect()->back()
                    ->with('alert', '오디오 파일 형식이 잘못되었습니다.');
            }
        }
        Exhibit::create($data);
        return redirect()->route('user.show', [$board, $user->id])
            ->with('alert', '작품이 게시되었습니다.');
    }

    public function edit(User $user, $board, Exhibit $exhibit) {
        return view('user.'.$board.'.exhibit.edit', [
            'user' => $user,
            'exhibit' => $exhibit,
        ]);
    }

    public function update(User $user, $board, Exhibit $exhibit, Request $request) {
        $data = $request->validate([
            'title' => 'required|max:255',
            'is_opened' => 'required',
            'role' => 'required',
            'description' => 'required',
            'youtube_url' => 'nullable|max:255|url',
            'lyrics' => 'nullable',
        ]);
        $data['user_id'] = Auth::id();
        if ($request->hasFile('cover_img_file')) {
            if (getFileType($request->file('cover_img_file')) === 'image') {
                $data['cover_img_file'] = $request->file('cover_img_file')->store('public//cover');
            } else {
                return redirect()->back()
                    ->with('alert', '이미지 파일 형식이 잘못되었습니다.');
            }
        }
        if ($request->hasFile('audio_file')) {
            if (getFileType($request->file('audio_file')) === 'audio') {
                $data['audio_file'] = $request->file('audio_file')->store('public/audio/exhibit');
            } else {
                return redirect()->back()
                    ->with('alert', '오디오 파일 형식이 잘못되었습니다.');
            }
        }
        $exhibit->update($data);
        return redirect()->route('user.show', [$board, $user->id])
            ->with('alert', '작품이 수정되었습니다.');
    }

    public function delete(User $user, $board, Exhibit $exhibit) {
        if($user[$board.'_exhibit_id'] === $exhibit->id) {
            $user->update([
                $board.'_exhibit_id' => NULL,
            ]);
        }
        $exhibit->delete();
        return redirect()->back()
            ->with('alert', '작품이 삭제되었습니다.');
    }

    public function audio(User $user, $board, Exhibit $exhibit)
    {
        return view('user.'.$board.'.exhibit.audio', [
            'exhibit' => $exhibit,
        ]);
    }
}
