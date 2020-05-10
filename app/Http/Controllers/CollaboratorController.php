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

    public function store(Request $request, Project $project) {
        $userStatus = $this->isCollaborator(Auth::user(), $project, $request->role);
        if ($userStatus === 0) {
            return redirect()->route('project.show', ['collaboration', $project->id])
                ->with('alert', '이미 신청하셨습니다.');
        } elseif ($userStatus === 1) {
            return redirect()->route('project.create', [$project->id, $request->role]);
        } elseif ($userStatus === 2) {
            return redirect()->route('project.show', ['collaboration', $project->id])
                ->with('alert', '신청이 거부당했습니다.');
        } else {
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
}
