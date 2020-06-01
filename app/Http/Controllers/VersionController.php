<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Version;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VersionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('audio');
    }

    public function create(Project $project, $role)
    {
        return view('project.collaboration.version.create', [
            'project' => $project,
            'role' => $role,
        ]);
    }

    public function store(Project $project, $role, Request $request)
    {

            $data = $request->validate([
                'title' => 'required|max:255',
                'description' => 'nullable',
                'is_opened' => 'nullable',
                'project_audio_file' => 'required|file|mimes:audio/mpeg,mpga,mp3,wav,aac',
                'mr_audio_file' => 'nullable|file|mimes:audio/mpeg,mpga,mp3,wav,aac',
                'voice_audio_file' => 'nullable|file|mimes:audio/mpeg,mpga,mp3,wav,aac',
                'lyrics' => 'nullable',
            ]);
        if ($role === 'composer' || $role === 'editor') {
            if (!$request->hasFile('project_audio_file') && !$request->hasFile('mr_audio_file')) {
                return redirect()->back()
                    ->with('alert', '오디오 파일이 한 개 이상 필요합니다.');
            }
        } elseif ($role === 'lyricist') {
            if ($request->lyrics) {
                return redirect()->back()
                    ->with('alert', '가사를 작성해주세요.');
            }
        } elseif ($role === 'singer') {
            if (!$request->hasFile('project_audio_file') && !$request->hasFile('voice_audio_file')) {
                return redirect()->back()
                    ->with('alert', '오디오 파일이 한 개 이상 필요합니다.');
            }
        } else {
            return redirect()->back()
                ->with('alert', '잘못된 경로입니다.');
        }

        if ($request->hasFile('project_audio_file')) {
            $data['project_audio_file'] = $request->file('project_audio_file')->store('public/audio/project');
        }
        if ($request->hasFile('mr_audio_file')) {
            $data['mr_audio_file'] = $request->file('mr_audio_file')->store('public/audio/mr');
        }
        if ($request->hasFile('voice_audio_file')) {
            $data['voice_audio_file'] = $request->file('voice_audio_file')->store('public/audio/voice');
        }

        $data['role'] = $role;
        $data['user_id'] = Auth::id();
        $data['project_id'] = $project->id;

        Version::create($data);
        return redirect()->route('project.show', ['collaboration', $project->id]);
    }

    public function delete(Project $project, Version $version)
    {
        if ($project->audio_version_id === $version->id) {
            $project->update([
                'audio_version_id' => NULL,
            ]);
        }
        if ($project->lyrics_version_id === $version->id) {
            $project->update([
                'lyrics_version_id' => NULL,
            ]);
        }
        $version->delete();
        return redirect()->back()->with('alert', '버전이 삭제되었습니다.');
    }

    public function audio(Project $project, Version $version, Request $request)
    {
        $audio_type = $request->type;
        return view('project.collaboration.version.audio', [
            'version' => $version,
            'audio_type' => $audio_type,
        ]);
    }
}
