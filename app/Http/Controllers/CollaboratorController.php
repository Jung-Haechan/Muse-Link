<?php

namespace App\Http\Controllers;

use App\Models\Collaborator;
use App\Models\Project;
use App\Traits\AuthTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CollaboratorController extends Controller
{
    use AuthTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Project $project)
    {
        $collaborator = $project->collaborators()->latest()->paginate(10);
        return view('project.collaboration.collaborator.index', [
            'project' => $project,
            'collaborators' => $collaborator,
        ]);
    }

    public function store(Request $request, Project $project)
    {
        $data = [
            'user_id' => Auth::id(),
            'project_id' => $project->id,
            'role' => $request->role,
        ];
        Collaborator::create($data);
        return redirect()->route('project.show', ['collaboration', $project->id])
            ->with('alert', '신청이 완료되었습니다. 프로젝트 관리자의 승인을 기다리세요.');
    }
}
