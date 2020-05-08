<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Version;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VersionController extends Controller
{
    public function create(Project $project, $role)
    {
        return view('project.collaboration.version.create', [
            'project' => $project,
            'role' => $role,
        ]);
    }

    public function store(Project $project, $role, Request $request)
    {
        if ($role === 'composer' || $role === 'editor') {
            $data = $request->validate([
                'title' => 'required|max:255',
                'description' => 'nullable',
                'project_audio_file' => 'required',
            ]);
            if (getFileType($request->file('project_audio_file')) === 'audio') {
                $data['project_audio_file'] = $request->file('project_audio_file')->store('public/audio/project');
            } else {
                return redirect()->back()
                    ->with('alert', '오디오 파일 형식이 잘못되었습니다.');
            }

        }
        elseif ($role === 'lyricist') {
            $data = $request->validate([
                'title' => 'required|max:255',
                'description' => 'nullable',
                'project_audio_file' => 'required',
                'lyrics' => 'required',
            ]);
        }
        elseif ($role === 'singer') {
            $data = $request->validate([
                'title' => 'required|max:255',
                'description' => 'nullable',
                'project_audio_file' => 'required',
                'voice_audio_file' => 'required',
            ]);
            if (getFileType($request->file('project_audio_file')) === 'audio'
                && getFileType($request->file('voice_audio_file')) === 'audio') {
                $data['project_audio_file'] = $request->file('project_audio_file')->store('public/audio/project');
                $data['voice_audio_file'] = $request->file('voice_audio_file')->store('public/audio/voice');
            } else {
                return redirect()->back()
                    ->with('alert', '오디오 파일 형식이 잘못되었습니다.');
            }

        }
        $data['role'] = $role;
        $data['user_id'] = Auth::id();
        $data['project_id'] = $project->id;

        Version::create($data);
        return redirect()->route('project.show', ['collaboration', $project->id]);
    }
}
