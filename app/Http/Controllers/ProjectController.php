<?php

namespace App\Http\Controllers;

use App\Models\Collaborator;
use App\Models\Project;
use App\Models\Version;
use App\Traits\AuthTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    use AuthTrait;

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index($board)
    {
        $projects = Project::listProjects(0, $board)->get();
        return view('project.' . $board . '.index', [
            'projects' => $projects,
        ]);
    }

    public function show($board, Project $project)
    {
        $versions = $project->versions()->listVersions(0)->get();
        $project['lyrics_version'] = Version::find($project->lyrics_version_id);
        $project['audio_version'] = Version::find($project->audio_version_id);
        $collaboratorStatus = [];
        foreach (config('translate.role') as $role_eng => $role_kor) {
            $collaboratorStatus[$role_eng] = $this->isCollaborator(Auth::user(), $project, $role_eng);
        }
        return view('project.' . $board . '.show', [
            'project' => $project,
            'versions' => $versions,
            'collaboratorStatus' => $collaboratorStatus,
        ]);
    }

    public function create()
    {
        return view('project.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'genre' => 'nullable|max:20',
            'description' => 'required',
        ]);
        if ($request->hasFile('cover_img_file')) {
            if (getFileType($request->file('cover_img_file')) === 'image') {
                $data['cover_img_file'] = $request->file('cover_img_file')->store('public/cover');
            } else {
                return redirect()->back()
                    ->with('alert', '이미지 파일 형식이 잘못되었습니다.');
            }
        }
        $data['user_id'] = Auth::id();
        Project::create($data);
        Collaborator::create([
            'user_id' => Auth::id(),
            'project_id' => Project::where('user_id', Auth::id())->first()->id,
            'role' => 'master',
            'is_approved' => 1,
        ]);
        return redirect()->route('project.index', 'collaboration');
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function update_face(Request $request, Project $project) {
        $type = $request->role === 'lyricist' ? 'lyrics_version_id' : 'audio_version_id';
        Project::where('id', $project->id)->update([
            $type => $request->version_id,
        ]);
        return redirect()->back()
            ->with('alert', $request->version_id.'해당 버전이 대표로 설정되었습니다.');
    }

    public function update_status(Request $request, Project $project) {
        $action = $project['has_'.$request->role] ? '마감' : '개방';
        Project::where('id', $project->id)->update([
            'has_'.$request->role => !$project['has_'.$request->role],
        ]);
        return redirect()->back()
            ->with('alert', config('translate.role.'.$request->role).' 신청을 '.$action.'했습니다.');
    }

    public function destroy()
    {

    }
}
