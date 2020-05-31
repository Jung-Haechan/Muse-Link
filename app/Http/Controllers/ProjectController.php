<?php

namespace App\Http\Controllers;

use App\Models\Collaborator;
use App\Models\Like;
use App\Models\Project;
use App\Models\Version;
use App\Traits\AuthTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    use AuthTrait, SoftDeletes;

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index(Request $request, $board)
    {
        $period = $request->period;
        $projects = Project::listAll($board, $period)->paginate(12);
        return view('project.' . $board . '.index', [
            'projects' => $projects,
            'period' => $period,
        ]);
    }

    public function show($board, Project $project)
    {
        if (!canAccessProject(Auth::user(), $project)) {
            return redirect()->back()
                ->with('alert', '접근 권한이 없습니다.');
        }
        $project->update([
            'views' => $project->views + 1,
        ]);
        $versions = $project->versions()->listAll()->get();
        $replies = $project->replies()->latest()->get();
        $project['likes'] = $project->likes()->count();
        $project['already_like'] = $project->likes()->where('user_id', Auth::id())->first() != NULL;
        $collaboratorStatus = [];
        foreach (config('translate.role') as $role_eng => $role_kor) {
            $collaboratorStatus[$role_eng] = $this->isCollaborator(Auth::user(), $project, $role_eng);
        }
        return view('project.' . $board . '.show.app', [
            'project' => $project,
            'board' => $board,
            'versions' => $versions,
            'replies' => $replies,
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

    public function edit(Project $project)
    {
        return view('project.edit', [
            'project' => $project,
        ]);
    }

    public function update(Project $project, Request $request)
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
        $project->update($data);
        return redirect()->route('project.show', ['collaboration', $project->id]);
    }

    public function update_face(Request $request, Project $project)
    {
        if (!isProjectAdmin(Auth::user(), $project)) {
            return redirect()->back()
                ->with('alert', '권한이 없습니다.');
        }
        $type = $request->role === 'lyricist' ? 'lyrics_version_id' : 'audio_version_id';
        Project::where('id', $project->id)->update([
            $type => $request->version_id,
        ]);
        return redirect()->back()
            ->with('alert', '해당 버전이 대표로 설정되었습니다.');
    }

    public function update_status(Request $request, Project $project)
    {
        $action = $project['has_' . $request->role] ? '개방' : '마감';
        Project::where('id', $project->id)->update([
            'has_' . $request->role => !$project['has_' . $request->role],
        ]);
        return redirect()->back()
            ->with('alert', config('translate.role.' . $request->role) . ' 신청을 ' . $action . '했습니다.');
    }

    public function update_complete(Project $project)
    {
        if ($project->audio_version_id && $project->lyrics_version_id) {
            $project->update([
                'completed_at' => now()->toDateTime(),
            ]);
            return redirect()->route('project.index', 'completed')
                ->with('alert', '프로젝트가 완성작으로 등록되었습니다.');
        } else {
            return redirect()->back()
                ->with('alert', '프로젝트가 완료되지 않았습니다.');
        }
    }

    public function delete(Project $project)
    {
        $project->delete();
        return redirect()->route('project.index', 'collaboration')->with('alert', '삭제가 완료되었습니다.');
    }

    public function audio($board, Project $project)
    {
        return view('project.audio',[
            'project' => $project,
        ]);
    }

    public function search(Request $request, $board) {
        $projects = Project::listAll($board)
            ->where(function ($query) use($request) {
                $query->where('title', 'like', '%'.$request->word.'%')
                    ->orWhere('genre', 'like', '%'.$request->word.'%')->paginate(12);
            })->paginate(12);
        return view('project.' . $board . '.index', [
            'projects' => $projects,
        ]);
    }
}
