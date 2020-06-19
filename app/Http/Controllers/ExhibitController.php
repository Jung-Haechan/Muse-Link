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
    public function __construct()
    {
        $this->middleware('auth')->except('audio');
    }

    public function create(User $user, $board)
    {
        return view('user.' . $board . '.exhibit.create', [
            'user' => $user,
        ]);
    }

    public function store(User $user, $board, Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'is_opened' => 'required',
            'role' => 'required',
            'description' => 'required',
            'cover_img_file' => 'nullable|file|mimes:image/jpg,jpeg,png,gif',
            'audio_file' => 'nullable|file|mimes:audio/mpeg,mpga,mp3,wav,aac',
            'youtube_url' => 'nullable|max:255|url',
            'lyrics' => 'nullable',
        ]);
        $data['user_id'] = Auth::id();
        $data[$board.'_updated_at'] = now();
        if ($request->hasFile('cover_img_file')) {
            $data['cover_img_file'] = $request->file('cover_img_file')->store('public/cover');
        }
        if ($request->hasFile('audio_file')) {
            $data['audio_file'] = $request->file('audio_file')->store('public/audio/exhibit');
        }
        Exhibit::create($data);
        return redirect()->route('user.show', [$board, $user->id])
            ->with('alert', '작품이 게시되었습니다.');
    }

    public function edit(User $user, $board, Exhibit $exhibit)
    {
        return view('user.' . $board . '.exhibit.edit', [
            'user' => $user,
            'exhibit' => $exhibit,
        ]);
    }

    public function update(User $user, $board, Exhibit $exhibit, Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'is_opened' => 'required',
            'role' => 'required',
            'description' => 'required',
            'cover_img_file' => 'nullable|file|mimes:image/jpg,jpeg,png,gif',
            'audio_file' => 'nullable|file|mimes:audio/mpeg,mpga,mp3,wav,aac',
            'youtube_url' => 'nullable|max:255|url',
            'lyrics' => 'nullable',
        ]);
        $data['user_id'] = Auth::id();
        if ($request->hasFile('cover_img_file')) {
            $data['cover_img_file'] = $request->file('cover_img_file')->store('public/cover');
        }
        if ($request->hasFile('audio_file')) {
            $data['audio_file'] = $request->file('audio_file')->store('public/audio/exhibit');
        }
        $exhibit->update($data);
        return redirect()->route('user.show', [$board, $user->id])
            ->with('alert', '작품이 수정되었습니다.');
    }

    public function delete(User $user, $board, Exhibit $exhibit)
    {
        if ($user[$board . '_exhibit_id'] === $exhibit->id) {
            $user->update([
                $board . '_exhibit_id' => NULL,
            ]);
        }
        $exhibit->delete();
        return redirect()->back()
            ->with('alert', '작품이 삭제되었습니다.');
    }

    public function audio(User $user, $board, Exhibit $exhibit)
    {
        return view('user.' . $board . '.exhibit.audio', [
            'exhibit' => $exhibit,
        ]);
    }
}
