<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MusicController extends Controller
{
    public function index($board)
    {
        if ($board === 'create') {
            return $this->create();
        } elseif ($board === 'edit') {
            $this->edit();
        } else {
            $musics = Music::listMusic(0, $board)->get();
            return view('music.'.$board.'.index', [
                'musics' => $musics,
            ]);
        }
    }

    public function show()
    {
        return view('music.collaboration.show');

    }

    public function create()
    {
        return view('music.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'genre' => 'nullable|max:20',
            'youtube_url' => 'nullable|url',
            'description' => 'required',
            'lyrics' => 'nullable',
            'composer' => 'nullable|max:100',
            'editor' => 'nullable|max:100',
            'lyricist' => 'nullable|max:100',
            'singer' => 'nullable|max:100',
        ]);
        if ($request->hasFile('audio_file') && explode('/', $request->file('audio_file')->getMimeType())[0] !== 'audio') {
            return redirect()->back()
                ->with('msg', '오디오 파일 형식이 잘못되었습니다.');
        } elseif ($request->hasFile('cover_img_file') && explode('/', $request->file('cover_img_file')->getMimeType())[0] !== 'image') {
            return redirect()->back()
                ->with('msg', '이미지 파일 형식이 잘못되었습니다.');
        } else {
            if ($request->hasFile('audio_file')) {
                $data['audio_file'] = $request->file('audio_file')->store('public/audio');
            }
            if ($request->hasFile('cover_img_file')) {
                $data['cover_img_file'] = $request->file('cover_img_file')->store('public/cover');
            }
            $data['user_id'] = Auth::id();
            Music::create($data);
            var_dump($data);
            return redirect()->route('index');
        }
    }

    public function edit()
    {

    }
    public function update()
    {

    }

    public function destroy()
    {

    }
}
