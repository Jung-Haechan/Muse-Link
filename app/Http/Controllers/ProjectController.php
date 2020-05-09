<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
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
        return view('project.' . $board . '.show', [
            'project' => $project,
            'versions' => $versions,
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
        return redirect()->route('project.index', 'collaboration');
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
