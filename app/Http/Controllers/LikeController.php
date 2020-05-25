<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store(Project $project) {
        Like::create([
            'user_id' => Auth::id(),
            'project_id' => $project->id,
        ]);
    }
}
